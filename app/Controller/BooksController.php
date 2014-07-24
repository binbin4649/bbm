<?php

App::uses('CakeTime', 'Utility');
App::uses('AppController', 'Controller');
class BooksController extends AppController {
    public $components = array('Paginator','Search.Prg');
    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'Book.id' => 'desc'
        )
    );
    public function index()
    {
        $this->Prg->commonProcess();
        $params = $this->Prg->parsedParams();
        $conditions = $this->Book->parseCriteria($params);
        $this->Paginator->settings = $this->paginate;
        $this->Paginator->settings['conditions'] = $conditions;
        $this->set('books', $this->Paginator->paginate());
        try {
            $this->render('home');
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    public function view($id)
    {
        $currentUserId = $this->Session->read('User.id');
        $currentBook = $this->Book->find('first',array('conditions'=>array('Book.id'=>$id)));
        if (!empty($currentBook)) {
            foreach($currentBook['Content'] as $contentKey=>$content) {
                $currentContent = $this->Book->Content->find('first',array('conditions'=>array('Content.id'=>$content['id'])));
                $currentBook['Content'][$contentKey]['bets'] = $currentContent['Bet'];
                foreach ($currentContent['Bet'] as $betKey => $bet) {
                    $currentBet = $this->Book->Bet->find('first',array('conditions'=>array('Bet.id'=>$bet['id'])));
                    $currentBook['Content'][$contentKey]['bets'][$betKey] = array('Bet'=>$currentBet['Bet'],'User'=>$currentBet['User']);
                }
            }
            if (!isset($_GET['format'])){
                $this->set('book',$currentBook);
                date_default_timezone_set('GMT');
                $startTime   = strtotime($currentBook['Book']['bet_start'])+($currentBook['Book']['time_zone'])*60*60;
                $finishTime  = strtotime($currentBook['Book']['bet_finish'])+($currentBook['Book']['time_zone'])*60*60;
                $resultTime  = strtotime($currentBook['Book']['result_time'])+($currentBook['Book']['time_zone'])*60*60;
                $currentTime = time();
                $this->set('startTime',$startTime);
                if ($currentTime-$resultTime > 60*60*24 && strtolower($currentBook['Book']['state']) != 'result'){
                    $this->Book->setTimeOver(array('book_id'=>$id));
                    $this->render(implode('/', ['book-timeover']));
                } else {
                    if ($startTime> $currentTime) {
                        $this->render(implode('/', ['book-upcoming']));
                    } else if ($startTime < $currentTime && $finishTime > $currentTime && $currentTime < $resultTime) {
                        $this->render(implode('/', ['book-betnow']));
                    } else if ( $finishTime < $currentTime && strtolower($currentBook['Book']['state']) != 'result' && $currentUserId != $currentBook['Book']['user_id']) {
                        $this->render(implode('/', ['book-betfinish']));
                    } else if ( $finishTime < $currentTime && strtolower($currentBook['Book']['state']) != 'result' && $currentUserId == $currentBook['Book']['user_id']) {
                        $this->render(implode('/', ['book-select-result']));
                    } else if ($currentTime > $resultTime) {
                        $winner = array_filter($currentBook['Content'],function($item) use($currentBook){
                          return $item['id'] == $currentBook['Book']['win_contents_id'];
                        });
                        $this->set('winner',$winner);
                        $this->render(implode('/', ['book-result']));
                    }
                }

            } else if ($_GET['format'] == 'json') {
                foreach($currentBook['Bet'] as $betKey=>$bet) {
                    $currentBet = $this->Book->Bet->find('first',array('conditions'=>array('Bet.id'=>$bet['id'])));
                    $currentBook['Bet'][$betKey]['user'] = $currentBet['User'];
                }
                $this->sendJSON($currentBook);
            }
        }
    }

    public function add()
    {
        if (empty($_POST)) {
                $this->render(implode('/', ['book-make']));
        } else {
            $book = $this->Book->createNewBook($_POST,$this->Session->read('User'));
            if (!is_array($book)){
                $this->redirect('/books'.'/'.$book);
            } else {
                $this->set('errors',$book);
                $this->render(implode('/', ['book-make']));
            }
        }
    }

    public function win()
    {
        $this->Book->setWinner($_POST);
        $this->sendJSON($_POST);
    }

    public function deleteBook()
    {
        $this->Book->setDelete($_POST);
        $this->sendJSON($_POST);
    }

    // public function copyBook()
    // {
    //     $book = $this->Book->copyBook($_POST);
    //     if (!is_array($book)){
    //          $this->sendJSON(array('book_id'=>$book));
    //     }
    // }

    // public function test()
    // {
    //     $currentBook = $this->Book->find('first',array('conditions'=>array('Book.id'=>'33')));

    //     var_dump($currentBook);die;
    // }

}
<?php

App::uses('CakeTime', 'Utility');
App::uses('AppController', 'Controller');
App::uses('BookDayState','Lib');
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
        $currentBook = $this->Book->find('first',array('conditions'=>array('Book.id'=>$id)));
        if (!empty($currentBook)) {
            $currentBook = $this->bookExtension($currentBook);
            if (!isset($_GET['format'])){
                $this->set('book',$currentBook);
                $bookdaystate = new BookDayState($currentBook);
                $this->set('startTime',$bookdaystate->getStartTime());
                if ($currentBook['Book']['state'] == 'Timeover'){

                    $this->render(implode('/', ['book-timeover']));

                } else if (ucfirst($currentBook['Book']['state']) == 'Up Coming') {

                    $this->render(implode('/', ['book-upcoming']));

                } else if (ucfirst($currentBook['Book']['state']) == 'Bet Now') {

                    $this->render(implode('/', ['book-betnow']));

                } else if (ucfirst($currentBook['Book']['state']) == 'Bet Finish' && !$this->Book->User->isOwner($currentBook['Book']['user_id'])) {

                    $this->render(implode('/', ['book-betfinish']));

                } else if (ucfirst($currentBook['Book']['state']) == 'Bet Finish' && $this->Book->User->isOwner($currentBook['Book']['user_id'])) {

                    $this->render(implode('/', ['book-select-result']));

                } else if (ucfirst($currentBook['Book']['state']) == 'Result') {
                    $winner = array_filter($currentBook['Content'],function($item) use($currentBook){
                      return $item['id'] == $currentBook['Book']['win_contents_id'];
                    });
                    $this->set('winner',$winner);
                    $this->render(implode('/', ['book-result']));
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

    private function bookExtension($currentBook)
    {
        foreach($currentBook['Content'] as $contentKey=>$content) {
            $currentContent = $this->Book->Content->find('first',array('conditions'=>array('Content.id'=>$content['id'])));
            $currentBook['Content'][$contentKey]['bets'] = $currentContent['Bet'];
            foreach ($currentContent['Bet'] as $betKey => $bet) {
                $currentBet = $this->Book->Bet->find('first',array('conditions'=>array('Bet.id'=>$bet['id'])));
                $currentBook['Content'][$contentKey]['bets'][$betKey] = array('Bet'=>$currentBet['Bet'],'User'=>$currentBet['User']);
            }
        }
        return $currentBook;
    }

    public function add()
    {
        if (empty($_POST)) {
                $this->render(implode('/', ['book-make']));
        } else {
            $book = $this->Book->createNewBook($_POST);
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
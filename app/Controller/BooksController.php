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
        // var_dump($_POST);
        $this->Prg->commonProcess();
        $params = $this->Prg->parsedParams();
        $conditions = $this->Book->parseCriteria($params);
        $this->Paginator->settings = $this->paginate;
        $this->Paginator->settings['conditions'] = $conditions;
        $this->set('books', $this->Paginator->paginate());
        try {
            $this->render(implode('/', ['home']));
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
            // var_dump($currentBook);
            foreach($currentBook['Content'] as $contentKey=>$content) {
                $currentContent = $this->Book->Content->find('first',array('conditions'=>array('Content.id'=>$content['id'])));
                // var_dump($currentContent);
                $currentBook['Content'][$contentKey]['bets'] = $currentContent['Bet'];
                foreach ($currentContent['Bet'] as $betKey => $bet) {
                    $currentBet = $this->Book->Bet->find('first',array('conditions'=>array('Bet.id'=>$bet['id'])));
                    $currentBook['Content'][$contentKey]['bets'][$betKey] = array('Bet'=>$currentBet['Bet'],'User'=>$currentBet['User']);
                }
            }
            if (!isset($_GET['format'])){
                $this->set('book',$currentBook);
                date_default_timezone_set('GMT');
                $startTime =  strtotime($currentBook['Book']['bet_start'])+($currentBook['Book']['time_zone'])*60*60;
                $finishTime = strtotime($currentBook['Book']['bet_finish'])+($currentBook['Book']['time_zone'])*60*60;
                $resultTime = strtotime($currentBook['Book']['result_time'])+($currentBook['Book']['time_zone'])*60*60;
                $currentTime = time();
                $this->set('startTime',$startTime);
                if ($startTime> $currentTime) {
                    $this->render(implode('/', ['book-upcoming']));
                } else if ($startTime < $currentTime && $finishTime > $currentTime && $currentTime < $resultTime) {
                    $this->render(implode('/', ['book-betnow']));
                } else if ( $finishTime < $currentTime && $currentTime < $resultTime) {
                    $this->render(implode('/', ['book-select-result']));
                } else if ($currentTime > $resultTime) {
                    $this->render(implode('/', ['book-result']));
                }
            } else if ($_GET['format'] == 'json') {
                foreach($currentBook['Bet'] as $betKey=>$bet) {
                    $currentBet = $this->Book->Bet->find('first',array('conditions'=>array('Bet.id'=>$bet['id'])));
                    $currentBook['Bet'][$betKey]['user'] = $currentBet['User'];
                }
                // var_dump($currentBook);
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

    public function findBetList($contentId) {
        return array();
    }
}
<?php

App::uses('CakeTime', 'Utility');
App::uses('AppController', 'Controller');
App::uses('BookDayState','Lib');
class BooksController extends AppController {
    public $components = array('Paginator','Search.Prg',"RequestHandler");
    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'Book.id' => 'desc'
        )
    );
	function beforefilter() {
		parent::beforefilter();
		//$this->Book->changeOddsAllContents(8);
	}
    public function index()
    {
        $this->Prg->commonProcess();
        $params = $this->Prg->parsedParams();
        $conditions = $this->Book->parseCriteria($params);
        $this->Paginator->settings = $this->paginate;
        $this->Paginator->settings['conditions'] = $conditions;
		//$this->Book->virtualFields = array("usercount"=>"select count(distinct(user_id)) as usercount from bets where bets.book_id = Book.id");
        $this->set('books', $this->Paginator->paginate());
        try {
            $this->set('pagetitle','BookBookMaker.com - Home');
            $this->render('home');
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    public function view($id=null)
    {
		//$this->Book->virtualFields = array("usercount"=>"select count(distinct(user_id)) as usercount from bets where bets.book_id = Book.id");
        $currentBook = $this->Book->find('first',array('conditions'=>array('Book.id'=>$id)));
		//pr($currentBook);
		//pr($_GET);
        if (!empty($currentBook)) {
            $currentBook = $this->bookExtension($currentBook);
            if (!isset($_GET['format'])){
                $this->set('book',$currentBook);
                $time_zone = $this->Book->TimeZone->find('first',array('conditions'=>array('TimeZone.id'=>$currentBook['Book']['time_zone'])));
                if (isset($time_zone['TimeZone']) && isset($time_zone['TimeZone']['value'])) {
                    $bookdaystate = new BookDayState($currentBook,$time_zone['TimeZone']['value']);
                    $this->set('startTime',$bookdaystate->getStartTime());
                    if (ucfirst($currentBook['Book']['state']) == 'Timeover' || ucfirst($currentBook['Book']['state']) == 'Result Timeover'){
                        $this->set('pagetitle',$currentBook['Book']['title']);
                        $this->render('book-timeover');

                    } else if (ucfirst($currentBook['Book']['state']) == 'Delete' || ucfirst($currentBook['Book']['state']) == 'Book Delete') {
                        $this->set('pagetitle',$currentBook['Book']['title']);
                        $this->render('book-delete');

                    } else if (ucfirst($currentBook['Book']['state']) == 'Up Coming') {
                        $this->set('pagetitle',$currentBook['Book']['title']);
                        $this->render('book-upcoming');

                    } else if (ucfirst($currentBook['Book']['state']) == 'Bet Now') {
                    	if($this->Book->isMakeBook() == false) $this->Session->setFlash('To bet, then please login.');
                        $this->set('pagetitle',$currentBook['Book']['title']);
                        $this->render('book-betnow');

                    } else if (ucfirst($currentBook['Book']['state']) == 'Bet Finish' && !$this->Book->User->isOwner($currentBook['Book']['user_id'])) {
                        $this->set('pagetitle',$currentBook['Book']['title']);
                        $this->render('book-betfinish');

                    } else if (ucfirst($currentBook['Book']['state']) == 'Bet Finish' && $this->Book->User->isOwner($currentBook['Book']['user_id'])) {
                        $this->set('pagetitle',$currentBook['Book']['title']);
                        $this->render('book-select-result');

                    } else if (ucfirst($currentBook['Book']['state']) == 'Result') {
                        $winner = array_filter($currentBook['Content'],function($item) use($currentBook){
                          return $item['id'] == $currentBook['Book']['win_contents_id'];
                        });
                        $this->set('pagetitle',$currentBook['Book']['title']);
                        $this->set('winner',$winner);
                        $this->render('book-result');
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

    public function add($book_id = null)
    {
        if(!empty($book_id)){
            $this->set('new_book',$this->Book->copyBook($book_id));
        }else{
            $new_book['Book'] = array('title'=>'','announcement_type'=>'URL','announcement_name'=>'','announcement'=>'','details'=>'','category'=>'Sports');
            $this->set('new_book',$new_book);
        }
        $this->set('pagetitle','Make Book');
        if (empty($_POST)) {
/*
                $this->set('timezone',$this->Book->TimeZone->getArrayForSelectForm());
                $this->render('book-make');
        } else {
            $book = $this->Book->createNewBook($_POST);
            if (!is_array($book)){
                $this->redirect('/books'.'/'.$book);
            } else {
                $this->set('errors',$book);
                $this->render('book-make');
*/
            if($this->Book->isMakeBook() == false) $this->Session->setFlash('You need login.');
            $this->set('timezone',$this->Book->TimeZone->getArrayForSelectForm());
            $this->render('book-make');
        } else {
            if($this->Book->isMakeBook()){
                $book = $this->Book->createNewBook($_POST);
                if (!is_array($book)){
                    $this->redirect('/books'.'/'.$book);
                } else {
                    $this->set('errors',$book);
                    $this->render('book-make');
                }    
            }else{
                $this->Session->setFlash('Repeat. You need login.');
                $this->set('timezone',$this->Book->TimeZone->getArrayForSelectForm());
                $this->render('book-make');
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

    //not work.
    public function deletecopybook()
    {
        $this->Book->setDelete($_POST);
        $this->sendJSON($_POST);
    }

    //Once, leave. not work.
    public function copyBook()
    {
		if($this->RequestHandler->isAjax()) {
            //$this->log($_POST);
            $this->set('new_book',$this->Book->copyBook($_POST));
            $this->set('timezone',$this->Book->TimeZone->getArrayForSelectForm());
            $this->render('book-make');
            //$this->redirect('book-make');
            /*
			if (!is_array($book)){
				$this->sendJSON(array('book_id'=>$book));
			}
            */
		}
    }

    // public function test()
    // {
    //     $currentBook = $this->Book->find('first',array('conditions'=>array('Book.id'=>'33')));

    //     var_dump($currentBook);die;
    // }

}
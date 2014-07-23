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

    public function add()
    {
        if (empty($_POST)) {
                $this->render(implode('/', 'book-make'));
        } else {
            $book = $this->Book->createNewBook($_POST,$this->Session->read('User'));
            if (!is_array($book)){
                $this->redirect('/book'.'/'.$book);
            } else {
                $this->set('errors',$book);
                $this->render(implode('/', 'book-make'));

            }
        }
    }
}
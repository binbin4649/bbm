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
            $this->render(implode('/', ['home']));
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }
}
<?php
App::uses('AppController', 'Controller');


class BetsController extends AppController {


    public function add()
    {
        $this->Bet->saveNewBet($_POST,$this->Session->read('User'));
        $this->sendJSON($_POST);
    }

}

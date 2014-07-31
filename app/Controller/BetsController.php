<?php
App::uses('AppController', 'Controller');


class BetsController extends AppController {


    public function add()
    {
        $this->Bet->saveNewBet($_POST);
        $this->sendJSON($_POST);
    }

}

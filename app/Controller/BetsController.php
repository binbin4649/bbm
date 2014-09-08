<?php
App::uses('AppController', 'Controller');


class BetsController extends AppController {


    public function add()
    {
        $save_result = $this->Bet->saveNewBet($_POST);
        //$this->log($save_result);
        $this->sendJSON($save_result);
        /*
        if($save_result == true){
        	$this->sendJSON($_POST);
        }else{
        	$this->set('errors',$save_result);
        	$this->redirect('/books'.'/'.$_POST['book_id']);
        }
        */
    }

}

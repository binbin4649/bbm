<?php

class ChangeStateShell extends Shell {
    public $tasks = array('BetNow', 'BetFinish','ResultSendMail');
    // public $uses = array('Book');
    public function betnow()
    {
        $this->BetNow->exacute();
    }

    public function betfinish()
    {
        $this->BetFinish->exacute();
    }

    public function result_send_mail_author()
    {
        $this->ResultSendMail->exacute();
    }
}
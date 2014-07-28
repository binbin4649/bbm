<?php

class ChangeStateShell extends Shell {
    public $tasks = array('BetNow', 'BetFinish');
    // public $uses = array('Book');
    public function betnow()
    {
        $this->BetNow->exacute();
    }

    public function betfinish()
    {
        $this->BetFinish->exacute();
    }
}
<?php

class ChangeStatusBetNowShell extends Shell {
    public $tasks = array('BetNow');
    // public $uses = array('Book');
    public function main()
    {
        $this->BetNow->exacute();
    }
}
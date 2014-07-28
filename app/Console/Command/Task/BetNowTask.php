<?php
App::uses('BookDayState','Lib');
class BetNowTask extends Shell {
    public $uses = array('Book');
    public function exacute() {
        $books = $this->Book->find('all',array('conditions'=>array('Book.state'=>'Up Coming')));
        foreach($books as $book) {
            $bookdaystate = new BookDayState($book);
            if ($bookdaystate->isBetNow()) {
                $this->Book->id = $book['Book']['id'];
                $this->Book->set('state','Bet Now');
                $this->Book->save();
            } else {
            }
        }
    }
}
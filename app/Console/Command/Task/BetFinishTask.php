<?php
App::uses('BookDayState','Lib');
class BetFinishTask extends Shell {
    public $uses = array('Book');
    public function exacute() {
        $books = $this->Book->find('all',array('conditions'=>array('Book.state'=>'Bet Now')));
        foreach($books as $book) {
            $bookdaystate = new BookDayState($book);
            if ($bookdaystate->isBetFinish()) {
                $this->Book->id = $book['Book']['id'];
                $this->Book->set('state','Bet Finish');
                $this->Book->save();
            } else {
            }
        }
    }
}
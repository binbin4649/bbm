<?php
App::uses('BookDayState','Lib');
class BetFinishTask extends Shell {
    public $uses = array('Book');
    public function exacute() {
        $books = $this->Book->find('all',array('conditions'=>array('Book.state'=>'Bet Now')));
        foreach($books as $book) {
            $time_zone = $this->Book->TimeZone->find('first',array('conditions'=>array('TimeZone.id'=>$book['Book']['time_zone'])));
            if (isset($time_zone['TimeZone']) && isset($time_zone['TimeZone']['value'])) {
                $bookdaystate = new BookDayState($book,$time_zone['TimeZone']['value']);
                if ($bookdaystate->isBetFinish()) {
                    $this->Book->id = $book['Book']['id'];
                    $this->Book->set('state','Bet Finish');
                    $this->Book->save();
                } else {
                }
            }
        }
    }
}
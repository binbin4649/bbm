<?php
App::uses('BookDayState','Lib');
class BetNowTask extends Shell {
    public $uses = array('Book', 'Update');
    public function exacute() {
        $books = $this->Book->find('all',array('conditions'=>array('Book.state'=>'Up Coming')));
        foreach($books as $book) {
            $time_zone = $this->Book->TimeZone->find('first',array('conditions'=>array('TimeZone.id'=>$book['Book']['time_zone'])));
            if (isset($time_zone['TimeZone']) && isset($time_zone['TimeZone']['value'])) {
                $bookdaystate = new BookDayState($book,$time_zone['TimeZone']['value']);
                if ($bookdaystate->isBetNow()) {
                    $this->Book->id = $book['Book']['id'];
                    $this->Book->set('state','Bet Now');
                    $this->Book->save();

                    $update = array();
                    $update['book_id'] = $book['Book']['id'];
                    $update['event'] = 'bet_start';
                    $this->Update->updateInfo($update);
                } else {
                }
            }
        }
    }
}
<?php
App::uses('BookDayState','Lib');
App::uses('CakeEmail', 'Network/Email');
class TimeOverTask extends Shell {
    public $uses = array('Book');
    public function exacute() {
        $books = $this->Book->find('all',array('conditions'=>array('Book.state'=>'Bet Finish')));
        foreach($books as $book) {
            $time_zone = $this->Book->TimeZone->find('first',array('conditions'=>array('TimeZone.id'=>$book['Book']['time_zone'])));
            if (isset($time_zone['TimeZone']) && isset($time_zone['TimeZone']['value'])) {
                $bookdaystate = new BookDayState($book,$time_zone['TimeZone']['value']);
                if ($bookdaystate->isTimeOut() && $book['Book']['timeover_info'] == false) {

$content = 'The result has not been selected after 24 hours from the announcement date and time the corresponding book is disabled and all points wagered are returned to all punters. 
The bookmaker will receive a penalty.

Book Title : '.$book['Book']['title'].'<br>Total Bet : '.$book['Book']['bet_all_total'].'<br>Total User : '.$book['Book']['user_all_count'].'

'.'<a href="http://bookbookmaker.com/books'.'/'.$book['Book']['id'].'">http://bookbookmaker.com/books'.'/'.$book['Book']['id'].'</a>';

                    $Email = new CakeEmail('sendGrid');
                    $Email->to($book['User']['mail']);
                    $Email->subject('The result has not been selected after 24 hours');
                    $Email->send($content);

                    $this->Book->seTimeover($book['Book']['id']);
                    
                } else {
                }
            }
        }
    }
}
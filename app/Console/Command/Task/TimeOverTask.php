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
                    $url = '<a href="'.$this->args[0].'/books'.'/'.$book['Book']['id'].'">'.$this->args[0].'/books'.'/'.$book['Book']['id'].'</a>';
                    $Email = new CakeEmail();
                    $Email->from(array('bbm@example.com' => 'bbm'));
                    $Email->to($book['User']['mail']);
                    $Email->subject('The result has not been selected after 24 hours');
                    $Email->emailFormat('html');
                    $Email->send(' The result has not been selected after 24 hours from the announcement date and time the corresponding book is disabled and all points wagered are returned to all punters. The bookmaker will receive a penalty.  <br/>'.$url);

                    $this->Book->id = $book['Book']['id'];
                    $this->Book->set('timeover_info',1);
                    $this->Book->set('state','Timeover');
                    $this->Book->save();

                    if(!empty($book['Bet'])){
                        $this->Book->returnBets($book['Bet']);
                        $this->Book->timeoverCount($book['User']);    
                    }
                    
                } else {
                }
            }
        }
    }
}
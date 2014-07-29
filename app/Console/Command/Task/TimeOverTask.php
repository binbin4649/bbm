<?php
App::uses('BookDayState','Lib');
App::uses('CakeEmail', 'Network/Email');
class TimeOverTask extends Shell {
    public $uses = array('Book');
    public function exacute() {
        $books = $this->Book->find('all',array('conditions'=>array('Book.state'=>'Bet Finish')));
        foreach($books as $book) {
            $bookdaystate = new BookDayState($book);
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
            } else {
            }
        }
    }
}
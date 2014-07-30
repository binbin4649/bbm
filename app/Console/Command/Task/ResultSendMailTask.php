<?php
App::uses('BookDayState','Lib');
App::uses('CakeEmail', 'Network/Email');
class ResultSendMailTask extends Shell {
    public $uses = array('Book');
    public function exacute() {
        $books = $this->Book->find('all',array('conditions'=>array('Book.state'=>'Bet Finish')));
        foreach($books as $book) {
            $time_zone = $this->Book->TimeZone->find('first',array('conditions'=>array('TimeZone.id'=>$book['Book']['time_zone'])));
            if (isset($time_zone['TimeZone']) && isset($time_zone['TimeZone']['value'])) {
                $bookdaystate = new BookDayState($book,$time_zone['TimeZone']['value']);
                if ($bookdaystate->isNotSetResult() && $book['Book']['result_time_info'] == false) {
                    $url = '<a href="'.$this->args[0].'/books'.'/'.$book['Book']['id'].'">'.$this->args[0].'/books'.'/'.$book['Book']['id'].'</a>';
                    $Email = new CakeEmail();
                    $Email->from(array('bbm@example.com' => 'bbm'));
                    $Email->to($book['User']['mail']);
                    $Email->subject('Please select. announce the results.');
                    $Email->emailFormat('html');
                    $Email->send('It is now time to announce the results.<br/>
                                    Please select a win. <br/>'.$url);

                    $this->Book->id = $book['Book']['id'];
                    $this->Book->set('result_time_info',1);
                    $this->Book->save();

                } else {
                }
            }
        }
    }
}
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
                    $Email = new CakeEmail('sendGrid');
                    $Email->template('betfinish');
                    $Email->to($book['User']['mail']);
                    $Email->subject('Bet終了 bookbookmaker.com');
                    $Email->viewVars(array('book' => $book));
                    $Email->send();

                    $this->Book->id = $book['Book']['id'];
                    $this->Book->set('result_time_info',1);
                    $this->Book->save();

                } else {
                }
            }
        }
    }
}
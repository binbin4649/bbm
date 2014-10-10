<?php
App::uses('CakeEmail', 'Network/Email');
class BetResultTask extends Shell {
    public $uses = array('Book','User','Bet');

    public function exacute() {
        $users = array();
        $books = $this->Book->find('all',array('conditions'=>array('Book.mail_info'=>0, 'Book.state'=>'result')));
        foreach($books as $book) {
            $update['Book'] = array('id'=>$book['Book']['id'], 'mail_info'=>1);
            $this->Book->save($update, false);

            foreach($book['Bet'] as $bet){
                if($bet['result_point'] === NULL){
                    $bet['result_point'] = 0;
                    $this->Bet->id = $bet['id'];
                    $this->Bet->set('result_point',0);
                    $this->Bet->save();
                }
                foreach($book['Content'] as $content){
                    if($content['id'] == $bet['content_id']) $bet['content_title'] = $content['title'];
                }
                $users[$bet['user_id']][$book['Book']['id']]['Bet'][] = $bet;
                $users[$bet['user_id']][$book['Book']['id']]['Book'] = $book;
            }
        }
        
        foreach($users as $user_id=>$u_books){
            $user = $this->User->find('first',array('conditions'=>array('User.id'=>$user_id)));
            $Email = new CakeEmail('sendGrid');
            $Email->template('betresult');
            $Email->to($user['User']['mail']);
            $Email->subject('結果発表 bookbookmaker.com');
            $Email->viewVars(array('user'=>$user, 'books'=>$u_books));
            $Email->send();
        }

    }
}
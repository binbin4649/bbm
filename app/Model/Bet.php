<?php
App::uses('AppModel','Model');

class Bet extends AppModel {
    public $name = 'Bet';
    public $useTable = 'bets';
    public $belongsTo = array('Book','Content','User');
    public $hasMany = array(
        'Passbook' => array(
            'className' => 'Passbook',
            'order' => 'Passbook.created DESC'
        )
    );
    public function saveNewBet($attrs,$currentUser)
    {
        $content = $this->Content->find('first',array('conditions'=>array('Content.id'=>$attrs['content_id'])));
        // var_dump($content);
        if (!empty($content)) {
            $attrs['oddFactor'] = (int) $attrs['oddFactor'];
            if ($attrs['oddFactor'] == 0) {
                $attrs['oddFactor'] = 1;
            }
            $betpoint = $content['Content']['odds'] * $attrs['oddFactor'];

            $book_bet_all_total = $content['Book']['bet_all_total'] + $betpoint;
            $result_point = $content['Content']['bet_total']+$betpoint;

            $this->Book->id = $content['Book']['id'];
            $this->Book->set('bet_all_total',$book_bet_all_total);
            $this->Book->set('title',$content['Book']['title']);
            $this->Book->set('user_all_count',++$content['Book']['user_all_count']);
            $this->Book->save();

            $this->Content->id = $content['Content']['id'];
            $this->Content->set('bet_total',$result_point);
            $this->Content->set('user_count',++$content['Content']['user_count']);
            $this->Content->set('odds',1/($content['Content']['bet_total']/($book_bet_all_total*0.99)));
            $this->Content->save();

            $this->create();
            $this->set('book_id',$attrs['book_id']);
            $this->set('content_id',$attrs['content_id']);
            $this->set('user_id',$currentUser['id']);
            $this->set('betpoint',$betpoint);
            $this->set('result_point',$result_point);
            $this->save();

            $betId = $this->getLastInsertId();

            $this->Passbook->create();
            $this->Passbook->set('book_id',$attrs['book_id']);
            $this->Passbook->set('content_id',$attrs['content_id']);
            $this->Passbook->set('user_id',$currentUser['id']);
            $this->Passbook->set('bet_id',$betId);
            $this->Passbook->set('point',$betpoint);
            $this->Passbook->set('balance',0);
            $this->Passbook->set('event','bet');

            $this->Passbook->save();


            $this->User->id = $currentUser['id'];
            $this->User->set('betlist',++$currentUser['betlist']);
            $this->User->save();
            $this->User->updateSession();


            return true;
        } else {
            return false;
        }
    }
}
<?php
App::uses('AppModel', 'Model');
/**
 * Bet Model
 *
 * @property Book $Book
 * @property Content $Content
 * @property User $User
 * @property Passbook $Passbook
 */

class Bet extends AppModel {
    public $name = 'Bet';
    public $useTable = 'bets';

    //The Associations below have been created with all possible keys, those that are not needed can be removed    
    /**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'Book' => array(
            'className' => 'Book',
            'foreignKey' => 'book_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Content' => array(
            'className' => 'Content',
            'foreignKey' => 'content_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    /**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'Passbook' => array(
            'className' => 'Passbook',
            'foreignKey' => 'bet_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => 'Passbook.created DESC',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );


    public function saveNewBet($attrs)
    {
        $currentUser = CakeSession::read('User');
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
            $user = $this->User->find('first',array('conditions'=>array('User.id'=>$currentUser['id'])));
            $currentPoint = $user['User']['point'] - $betpoint;

            $this->Book->id = $content['Book']['id'];
            $this->Book->set('bet_all_total',$book_bet_all_total);
            $this->Book->set('title',$content['Book']['title']);
            $this->Book->set('user_all_count',++$content['Book']['user_all_count']);
            $this->Book->save();

            $this->Content->id = $content['Content']['id'];
            $this->Content->set('bet_total',$result_point);
            $this->Content->set('user_count',++$content['Content']['user_count']);
            $this->Content->set('odds',1/($result_point/($book_bet_all_total*0.99)));
            $this->Content->save();

            $this->create();
            $this->set('book_id',$attrs['book_id']);
            $this->set('content_id',$attrs['content_id']);
            $this->set('user_id',$currentUser['id']);
            $this->set('betpoint',$betpoint);
            $this->set('result_point',$result_point);
            $this->save();

            $betId = $this->getLastInsertId();

            $this->User->id = $currentUser['id'];
            $this->User->set('betlist',++$user['User']['betlist']);
            $this->User->set('point', $currentPoint);
            $this->User->save();
            $this->User->updateSession();

            $this->Passbook->create();
            $this->Passbook->set('book_id',$attrs['book_id']);
            $this->Passbook->set('content_id',$attrs['content_id']);
            $this->Passbook->set('user_id',$currentUser['id']);
            $this->Passbook->set('bet_id',$betId);
            $this->Passbook->set('point',$betpoint);
            $this->Passbook->set('balance', $currentPoint);
            $this->Passbook->set('event','bet');
            $this->Passbook->save();

            return true;
        } else {
            return false;
        }
    }
}
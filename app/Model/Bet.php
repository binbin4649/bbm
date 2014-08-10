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
		//pr($attrs);
		//die;
        $currentUser = CakeSession::read('User');
        $content = $this->Content->find('first',array('conditions'=>array('Content.id'=>$attrs['content_id'])));
        // var_dump($content);
        if (!empty($content)) {
		App::import('model','Book');
		App::import('model','User');
		App::import('model','Content');
		App::import('model','Passbook');
		
            $attrs['oddFactor'] = (int) $attrs['oddFactor'];
            if ($attrs['oddFactor'] == 0) {
                $attrs['oddFactor'] = 1;
            }
            $betpoint = $content['Content']['odds'] * $attrs['oddFactor'];
            $book_bet_all_total = $content['Book']['bet_all_total'] + $betpoint;
            $content_bet_total = $content['Content']['bet_total']+$betpoint;

            $this->Book->id = $content['Book']['id'];
            $this->Book->set('bet_all_total',$book_bet_all_total);
            $this->Book->set('title',$content['Book']['title']);
            $this->Book->set('user_all_count',++$content['Book']['user_all_count']);
            $this->Book->save();

            /* change all content odds */
			$this->Content->create();
            $this->Content->id = $content['Content']['id'];
            $dd['Content']['bet_total'] = $content_bet_total;
            $dd['Content']['user_count'] = ++$content['Content']['user_count'];
            $dd['Content']['odds']  = number_format((1/($content_bet_total/($book_bet_all_total*0.99))),2,".",",");
			//pr($dd);
			//die;
			$this->Content->save($dd);
/*
            $this->Content->id = $content['Content']['id'];
            $this->Content->set('bet_total',$content_bet_total);
            $this->Content->set('user_count',++$content['Content']['user_count']);
            $this->Content->save();
*/
            $this->create();
            $this->set('book_id',$attrs['book_id']);
            $this->set('content_id',$attrs['content_id']);
            $this->set('user_id',$currentUser['id']);
            $this->set('betpoint',$betpoint);
            $this->save();
            $betId = $this->getLastInsertId();

            $passbook = array();
            $passbook['book_id'] = $attrs['book_id'];
            $passbook['content_id'] = $attrs['content_id'];
            $passbook['user_id'] = $currentUser['id'];
            $passbook['bet_id'] = $betId;
            $passbook['point'] = $betpoint;
            $passbook['event'] = 'bet';
            $this->Passbook->pointOperation($passbook);

            $this->Book->changeOddsAllContents($attrs['book_id']);

            return true;
        } else {
            return false;
        }
    }
}
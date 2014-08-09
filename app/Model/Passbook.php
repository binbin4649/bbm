<?php
App::uses('AppModel', 'Model');
/**
 * Passbook Model
 *
 * @property User $User
 * @property Book $Book
 * @property Content $Content
 * @property Bet $Bet
 */
class Passbook extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
		'Bet' => array(
			'className' => 'Bet',
			'foreignKey' => 'bet_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $validate = array(
		'user_id'=>array(
			'notempty'=>array(
				'rule'=>'notempty',
				'message'=>'Please select user.'
			)
		),
		'point'=>array(
			'notempty'=>array(
				'rule'=>'notempty',
				'message'=>'Please enter points.'
			)
		),
		'event'=>array(
			'notempty'=>array(
				'rule'=>'notempty',
				'message'=>'Please enter event.'
			)
		)
		
	);

	public function pointOperation($attrs){
		$user = $this->User->find('first',array('conditions'=>array('User.id'=>$attrs['user_id'])));
		$this->User->id = $attrs['user_id'];
		if($attrs['event'] == 'bet'){
			$this->User->set('betlist',++$user['User']['betlist']);
			$currentPoint = $user['User']['point'] - $attrs['point'];
		}elseif($attrs['event'] == 'welcome'){
			$currentPoint = $attrs['point'];
		}elseif($attrs['event'] == 'win'){
			$currentPoint = $user['User']['point'] + $attrs['point'];
		}elseif($attrs['event'] == 'reward'){
			$currentPoint = $user['User']['point'] + $attrs['point'];
		}elseif($attrs['event'] == 'delete'){
			$currentPoint = $user['User']['point'] + $attrs['point'];
		}
		
		if($currentPoint < 1) return false; // no minus

        $this->User->set('point', $currentPoint);
        if($this->User->save()){
        	$this->User->updateSession();
        }else{
        	$this->log('Passbook.php pointOperation : ', $this->User);
        }
        
        $this->create();
        if(!empty($attrs['book_id'])) $this->set('book_id',$attrs['book_id']);
        if(!empty($attrs['content_id'])) $this->set('content_id',$attrs['content_id']);
        if(!empty($attrs['bet_id'])) $this->set('bet_id',$attrs['bet_id']);
        $this->set('user_id',$attrs['user_id']);
        $this->set('point',$attrs['point']);
        $this->set('balance', $currentPoint);
        $this->set('event',$attrs['event']);
        if($this->save()){
        }else{
        	$this->log('Passbook.php pointOperation : ', $this);
        }
	}
}

<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Facebook $Facebook
 * @property Bet $Bet
 * @property Book $Book
 * @property Passbook $Passbook
 * @property Update $Update
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Bet' => array(
			'className' => 'Bet',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Book' => array(
			'className' => 'Book',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Passbook' => array(
			'className' => 'Passbook',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Update' => array(
			'className' => 'Update',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	public function saveFBUser($user)
    {
        $record = $this->find('first',array('conditions'=>array('User.facebook_id'=>$user['id'])));
        if (empty($record)) {
            $this->create();
            $this->set('facebook_id',$user['id']);
            $this->set('facebook_link',$user['link']);
            $this->set('facebook_username',$user['name']);
            $this->set('name',$user['name']);
            $this->set('time_zone',$user['timezone']);
            $this->set('language',$user['locale']);

            $this->set('profile','');
            $this->set('facebook_gender',$user['gender']);
            $this->set('facebook_mail',(isset($user['email'])) ? $user['email'] : '');
            $this->set('mail',(isset($user['email'])) ? $user['email'] : '');

            $this->save();
            return $this->saveFBUser($user);
        } else {
            return $record;
        }

    }
}

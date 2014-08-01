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
}

<?php
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');
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

	public $name = 'User';
    public $useTable = 'users';

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
			'order' => 'Bet.created DESC',
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
			'order' => 'Book.created DESC',
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
			'order' => 'Passbook.created DESC',
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

    public $belongsTo = array(
        'TimeZone' => array(
                'foreignKey'    => 'time_zone'
            )
        );
    

    public function makeBonus($user_id,$user_all_count){
        $user = $this->find('first',array('conditions'=>array('User.id'=>$user_id)));
        if($user['User']['make_bonus'] == null){// first bonus
            $this->id =  $user['User']['id'];
            $this->set('make_bonus',1);
            $this->save();
            $passbook = array();
            $passbook['user_id'] = $user['User']['id'];
            $passbook['point'] = 100;
            $passbook['event'] = 'bonus';
            $this->Passbook->pointOperation($passbook);
        }else{
            if($user['User']['make_bonus'] == 1 and $user_all_count >= 10){ // 10user bonus
                $this->id =  $user['User']['id'];
                $this->set('make_bonus',2);
                $this->save();
                $passbook = array();
                $passbook['user_id'] = $user['User']['id'];
                $passbook['point'] = 100;
                $passbook['event'] = 'bonus';
                $this->Passbook->pointOperation($passbook);
            }elseif($user['User']['make_bonus'] == 2 and $user_all_count >= 50){
                $this->id =  $user['User']['id'];
                $this->set('make_bonus',3);
                $this->save();
                $passbook = array();
                $passbook['user_id'] = $user['User']['id'];
                $passbook['point'] = 500;
                $passbook['event'] = 'bonus';
                $this->Passbook->pointOperation($passbook);
            }elseif($user['User']['make_bonus'] == 3 and $user_all_count >= 100){
                $this->id =  $user['User']['id'];
                $this->set('make_bonus',4);
                $this->save();
                $passbook = array();
                $passbook['user_id'] = $user['User']['id'];
                $passbook['point'] = 1000;
                $passbook['event'] = 'bonus';
                $this->Passbook->pointOperation($passbook);
            }elseif($user['User']['make_bonus'] == 4 and $user_all_count >= 1000){
                $this->id =  $user['User']['id'];
                $this->set('make_bonus',5);
                $this->save();
                $passbook = array();
                $passbook['user_id'] = $user['User']['id'];
                $passbook['point'] = 10000;
                $passbook['event'] = 'bonus';
                $this->Passbook->pointOperation($passbook);
            }
        }
    }
    
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
            $userId = $this->getLastInsertId();

            $passbook = array();
            $passbook['user_id'] = $userId;
            $passbook['point'] = 1000;
            $passbook['event'] = 'welcome';
            $this->Passbook->pointOperation($passbook);

            //welcome mail operation
			if(isset($user['email'])){
                $content['user_id'] = $userId;
                $content['user_name'] = $user['name'];
				$Email = new CakeEmail('sendGrid');
                $Email->template('welcome');
                $Email->to($user['email']);
                $Email->subject('Welcome! bookbookmaker.com');
                $Email->viewVars($content);
                $Email->send();
			}
                    

            return $this->saveFBUser($user);
        } else {
            $this->id =  $record['User']['id'];
            $this->set('login_count',++$record['User']['login_count']);
            $this->save();
            return $record;
        }
    }

    public function updateSession()
    {
        $user_id = CakeSession::read('User.id');
        if(isset($user_id)){
        	$user = $this->find('first',array('conditions'=>array('User.id'=>$user_id)));
        	if(isset($user)){
        		CakeSession::write('User',$user['User']);
        		return true;
        	}else{
        		return false;
        	}
        }
    }

    public function isOwner($book_user_id)
    {
        return CakeSession::read('User.id') == $book_user_id;
    }

    public function updateProfile($data)
    {
        if(empty($data['User']['language'])) $data['User']['language'] = 'ja';
        if(empty($data['User']['time_zone'])) $data['User']['time_zone'] = 9;
        $this->id = CakeSession::read('User.id');
        $this->set('mail',$data['User']['mail']);
        $this->set('profile',$data['User']['profile']);
        $this->set('name',$data['User']['name']);
        $this->set('default_rate',$data['User']['default_rate']);
        $this->set('language',$data['User']['language']);
        $this->set('time_zone',$data['User']['time_zone']);
        $this->set('facebook_link_hide',$data['User']['facebook_link_hide']);
        $this->save();
    }
}

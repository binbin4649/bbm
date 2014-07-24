<?php
App::uses('AppModel','Model');

class User extends AppModel {
    public $name = 'User';
    public $useTable = 'users';
    public $hasMany = array(
        'Book' => array(
            'className' => 'Book',
            'order' => 'Book.created DESC'
        ),
        'Bet' => array(
            'className' => 'Bet',
            'order' => 'Bet.created DESC'
        ),
        'Passbook' => array(
            'className' => 'Passbook',
            'order' => 'Passbook.created DESC'
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

    public function updateSession()
    {
        $user_id = CakeSession::read('User.id');
        $user = $this->find('first',array('conditions'=>array('User.id'=>$user_id)));
        CakeSession::write('User',$user['User']);
    }
}
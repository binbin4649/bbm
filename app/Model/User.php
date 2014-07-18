<?php
App::uses('AppModel','Model');

class User extends AppModel {
    public $name = 'User';
    public $useTable = 'users';
    public $hasMany = array(
        'Books' => array(
            'className' => 'Book',
            'order' => 'Book.created DESC'
        )
    );
    public function saveFBUser($user)
    {
        $record = $this->find('all',array('conditions'=>array('User.facebook_id'=>$user['id'])));
        // var_dump($record);
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


        }

    }
}
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
}
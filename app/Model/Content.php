<?php
App::uses('AppModel','Model');

class Content extends AppModel {
    public $name = 'Content';
    public $useTable = 'contents';
    public $belongsTo = 'Book';
    public $hasMany = array(
        'Bet' => array(
            'className' => 'Bet',
            'order' => 'Bet.created DESC'
        ),
        'Passbook' => array(
            'className' => 'Passbook',
            'order' => 'Passbook.created DESC'
        )
    );
}
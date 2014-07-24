<?php
App::uses('AppModel','Model');

class Passbook extends AppModel {
    public $name = 'Passbook';
    public $useTable = 'passbooks';
    public $belongsTo = array('Book','Content','User','Bet');

}
<?php
App::uses('AppModel','Model');

class Content extends AppModel {
    public $name = 'Content';
    public $useTable = 'contents';
    public $belongsTo = 'Book';
}
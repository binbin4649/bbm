 <?php
App::uses('AppModel','Model');

class Book extends AppModel {
    public $name = 'Book';
    public $useTable = 'books';
    public $belongsTo = 'User';
    public $actsAs = array('Search.Searchable');
    public $filterArgs = array(
        'category' => array(
            'type' => 'like',
            'field' => 'category'
        ),
        'state' => array(
            'type' => 'like',
            'field' => 'state'
        ),
        'title' => array(
            'type' => 'like',
            'field' => 'title'
        )
    );
}
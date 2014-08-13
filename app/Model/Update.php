<?php
App::uses('AppModel','Model');

class Update extends AppModel {
    public $name = 'Update';
    public $useTable = 'updates';

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
		)
	);

    public function updateInfo($attrs){

    	$this->create();
    	if(!empty($attrs['book_id'])){
    		$this->set('book_id',$attrs['book_id']);
    		$book = $this->Book->find('first',array('conditions'=>array('Book.id'=>$attrs['book_id'])));	
    	}

        if(!empty($attrs['user_id'])) {
        	$this->set('user_id',$attrs['user_id']);
        }
        
	    if($attrs['event'] == 'bet_start'){
	    	$content = '[Bet Now!] '.$book['Book']['title'].' | Bet start time:'.CakeTime::format( $book['Book']['bet_start'],'%Y/%m/%d %H:%M').' , The bet has started!';
	    }elseif($attrs['event'] == 'bet_result'){
	     	$content = '[Result Announcement!] '.$book['Book']['title'].' | Announcement time:'.CakeTime::format( $book['Book']['modified'],'%Y/%m/%d %H:%M').' ,  The results have been announced!';
	    }
	    $this->set('content',$content);
	    $this->set('event',$attrs['event']);
	    $this->save();
	}

}
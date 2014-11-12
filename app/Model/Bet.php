<?php
App::uses('AppModel', 'Model');
App::uses('BookDayState','Lib');
/**
 * Bet Model
 *
 * @property Book $Book
 * @property Content $Content
 * @property User $User
 * @property Passbook $Passbook
 */

class Bet extends AppModel {
    public $name = 'Bet';
    public $useTable = 'bets';

    //The Associations below have been created with all possible keys, those that are not needed can be removed    
    /**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
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
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    /**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'Passbook' => array(
            'className' => 'Passbook',
            'foreignKey' => 'bet_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => 'Passbook.created DESC',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );


    public function saveNewBet($attrs)
    { 
		App::import('model','Book');
        App::import('model','User');
        App::import('model','Content');
        App::import('model','Passbook');

        $sessionUser = CakeSession::read('User');
        $content = $this->Content->find('first',array('conditions'=>array('Content.id'=>$attrs['content_id'])));
        
        //check finish time
        /*  In nature, use it.
        $time_zone = $this->Book->TimeZone->find('first',array('conditions'=>array('TimeZone.id'=>$content['Book']['time_zone'])));
        $bookdaystate = new BookDayState($content['Book'],$time_zone['TimeZone']['value']);
        if ($bookdaystate->isBetNow())
        */
        $exUser = $this->User->find('first',array('conditions'=>array('User.id'=>$sessionUser['id'])));
        $currentUser = $exUser['User'];

        $errors = null;
        $bets = $this->find('all',array(
            'conditions'=>array('Bet.book_id'=>$content['Book']['id'], 'Bet.user_id'=>$currentUser['id']),
            'recursive'=> -1,
            ));
        if($bets){
            $max_point_counter = 0;
            foreach($bets as $bet){
                $max_point_counter = $max_point_counter + $bet['Bet']['betpoint'];
            }
            $max_point_counter = $max_point_counter + $attrs['oddFactor'];
            if($max_point_counter > 100) $errors['Bet'][] = 'Maximum Total Bet: 100 points';
        }
        $attrs['oddFactor'] = (int) $attrs['oddFactor'];
        if($attrs['oddFactor'] <= 0) $errors['Bet'][] = 'Only positive number.';
        if($attrs['oddFactor'] > 100) $errors['Bet'][] = 'Maximum : 100 points';
        if($currentUser['point'] < $attrs['oddFactor']) $errors['Bet'][] = 'Bet is too big.';
        if(strtotime($content['Book']['bet_finish']) < time()) $errors['Bet'][] = 'This book is bet finish.';

        if (empty($errors)){
            /*
            if ($attrs['oddFactor'] == 0) {
                $attrs['oddFactor'] = 1;
            }
            $this->log($attrs['oddFactor']);
            */
            //$betpoint = $content['Content']['odds'] * $attrs['oddFactor'];
            $betpoint = $attrs['oddFactor'];
            $book_bet_all_total = $content['Book']['bet_all_total'] + $betpoint;
            $content_bet_total = $content['Content']['bet_total']+$betpoint;


            $user_count = $this->find('count', array('conditions'=>array('Bet.book_id' => $content['Book']['id'], 'Bet.user_id' => $currentUser['id'])));
            if($user_count == 0){
                $user_all_count = ++$content['Book']['user_all_count'];
            }else{
                $user_all_count = $content['Book']['user_all_count'];
            }

            $this->Book->id = $content['Book']['id'];
            $this->Book->set('bet_all_total',$book_bet_all_total);
            $this->Book->set('title',$content['Book']['title']);
            $this->Book->set('user_all_count',$user_all_count);
            $this->Book->save();

            /* change all content odds */
			$this->Content->create();
            $this->Content->id = $content['Content']['id'];
            $dd['Content']['bet_total'] = $content_bet_total;
            $dd['Content']['user_count'] = ++$content['Content']['user_count'];
            $dd['Content']['odds']  = number_format((1/($content_bet_total/($book_bet_all_total*0.99))),2,".",",");
			//pr($dd);
			//die;
			$this->Content->save($dd);
/*
            $this->Content->id = $content['Content']['id'];
            $this->Content->set('bet_total',$content_bet_total);
            $this->Content->set('user_count',++$content['Content']['user_count']);
            $this->Content->save();
*/
            $this->create();
            $bet['Bet']['book_id']  = $attrs['book_id'];
            $bet['Bet']['content_id'] = $attrs['content_id'];
            $bet['Bet']['user_id'] = $currentUser['id'];
            $bet['Bet']['betpoint'] = $betpoint;
            $this->save($bet);
            $betId = $this->getLastInsertId();

            $passbook = array();
            $passbook['book_id'] = $attrs['book_id'];
            $passbook['content_id'] = $attrs['content_id'];
            $passbook['user_id'] = $currentUser['id'];
            $passbook['bet_id'] = $betId;
            $passbook['point'] = $betpoint;
            $passbook['event'] = 'bet';
            $this->Passbook->pointOperation($passbook);

            $this->Book->changeOddsAllContents($attrs['book_id']);

            return true;
        } else {
            return $errors;
        }
    }
}
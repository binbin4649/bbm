 <?php
App::uses('AppModel','Model');
App::uses('CakeEmail', 'Network/Email');
App::import('Model','Update');

class Book extends AppModel {
    public $name = 'Book';
    public $useTable = 'books';
    public $belongsTo = array(
    'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
    ),
    'TimeZone' => array(
            'foreignKey'    => 'time_zone'
        )
    );
    public $actsAs = array('Search.Searchable');
    public $hasMany = array(
        'Content' => array(
            'className' => 'Content',
            'order' => 'Content.no ASC'
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
    public $validate = array(
    	/*
        'title' => array(
            'alphaNumeric'=>array(
                'on'         => 'create',
                'rule'     => array('custom', '~^[a-zA-Z0-9\s-]+$~'),
                'required' => true,
                'message'  => 'Letters, numbers, spaces and dashes only'
                )
            ),
        'bet_start'  => array(
            'rule'       => 'datetime',
            'message'    => 'Enter a valid date',
            'allowEmpty' => false
            ),
        */
        'bet_start'  => array(
            'identical'=>array(
                    'rule'       =>array('checkBetStart'),
                    'message'    => 'Enter a valid date',
                )
            ),
        'bet_finish'  => array(
            'identical'=>array(
                    'rule'       =>array('checkBetFinish'),
                    'message'    => 'Enter a valid date',
                )
            ),
        'result_time'  => array(
            'identical'=>array(
                    'rule'       =>array('checkResultTime'),
                    'message'    => 'Enter a valid date',
                )
            )
    );

    public function checkBetStart($check){
        $betStart = strtotime($this->data['Book']['bet_start']);
        if($betStart < time()){
            return false;
        } else {
            return true;
        }
    }

    public function checkBetFinish($check)
    {
        $betStart = strtotime($this->data['Book']['bet_start']);
        $betFinish = strtotime($this->data['Book']['bet_finish']);
        if ($betFinish < $betStart) {
            return false;
        } else {
            if ($betFinish < time()) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function checkResultTime($check){
    	$betFinish = strtotime($this->data['Book']['bet_finish']);
    	$resultTime = strtotime($this->data['Book']['result_time']);
    	if($resultTime < $betFinish){
    		return false;
    	} else {
    		if($resultTime < time()){
    			return false;
    		} else {
    			return true;
    		}
    	}
    }

    public function createNewBook($data)
    {
        $user = CakeSession::read('User');
        $formData = $data['data'];
        $formData['Book']['time_zone'] = 69; // For now, Japan fixed time.
        if(empty($formData['Book']['category'])) $formData['Book']['category'] = 'Other';
        $this->create();
        $this->set('user_id',$user['id']);
        $this->set('bet_start',$formData['Book']['betStartDate'].' '.$formData['Book']['betStartTime'].':00');
        $this->set('bet_finish',$formData['Book']['betFinishDate'].' '.$formData['Book']['betFinishTime'].':00');
        $this->set('result_time',$formData['Book']['betResultDate'].' '.$formData['Book']['betResultTime'].':00');
        $this->set('time_zone',$formData['Book']['time_zone']);
        $this->set('details',$formData['Book']['bookDetail']);
        $this->set('category',$formData['Book']['category']);
        $this->set('title',$formData['Book']['title']);
        $this->set('state','Up Coming');
        $this->set('announcement_type',$formData['Book']['announcement']);
        $this->set('announcement',$formData['Book']['announcementDetail']);
        $this->set('announcement_name',$formData['Book']['announcementName']);
        $content_valid_count  = 0;
        foreach($formData['Book']['content'] as $singleContent) {
            if (strlen($singleContent) > 0) {
                $content_valid_count++;
            }
        }
        if ($content_valid_count >= 2) {
            $save = $this->save();
            if (!$save) {
                return $this->validationErrors;
            }
            foreach($formData['Book']['content'] as $no=>$singleContent) {
                if (!empty($singleContent)) {
                    $this->Content->create();
                    $this->Content->set('book_id',$this->getLastInsertId());
                    $this->Content->set('no',$no);
                    $this->Content->set('title',$singleContent);
                    $this->Content->save();
                }
            }
            $this->User->id = $user['id'];
            $this->User->set('makedbook',++$user['makedbook']);
            $this->User->save();
            $this->User->makeBonus($user['id'],0);
            return $this->getLastInsertId();
        } else {
            $this->validates();
            $errors = $this->validationErrors;
            $errors['content'][] = 'Required 2 book content';
            return $errors;
        }
    }

    public function setWinner($attrs)
    {
        $currentUser = CakeSession::read('User');
        $currentContent = $this->Content->find('first',array('conditions'=>array('Content.id'=>$attrs['content_id'])));

        if (!empty($currentUser) and !empty($currentContent['Book'])) {
            $reward_point = floor($currentContent['Book']['bet_all_total'] * 0.01);
            if ($reward_point <= 0) $reward_point = 0;
            $final_odds = $currentContent['Content']['odds'];

            $this->id = $attrs['book_id'];
            $this->set('state','result');
            $this->set('result_detail',$attrs['result_detail']);
            $this->set('win_contents_id',$attrs['content_id']);
            $this->set('reward_point',$reward_point);
            $this->set('title',$currentContent['Book']['title']);
            $this->save();

            if(!empty($currentContent['Bet'])){
            	foreach($currentContent['Bet'] as $bet){
	                //passbook operation
	                $result_point = floor($final_odds * $bet['betpoint']);
	                $passbook = array();
	                $passbook['book_id'] = $bet['book_id'];
	                $passbook['content_id'] = $bet['content_id'];
	                $passbook['user_id'] = $bet['user_id'];
	                $passbook['bet_id'] = $bet['id'];
	                $passbook['point'] = $result_point;
	                $passbook['event'] = 'win';
	                $user = $this->Passbook->pointOperation($passbook);

	                //bet operation
	                $this->Bet->create();
	                $this->Bet->set('id', $bet['id']);
	                $this->Bet->set('result_point', $result_point);
	                $this->Bet->save();         
	            }
            }
            
            $passbook = array();
            $passbook['book_id'] = $attrs['book_id'];
            $passbook['user_id'] = $currentUser['id'];
            $passbook['point'] = $reward_point;
            $passbook['event'] = 'reward';
            $this->Passbook->pointOperation($passbook);

            $UpdateModel = new Update;
            $update = array();
            $update['book_id'] = $attrs['book_id'];
            $update['event'] = 'bet_result';
            $UpdateModel->updateInfo($update);

            $this->User->makeBonus($currentUser['id'],$currentContent['Book']['user_all_count']);
            return true;
        } else {
            return false;
        }
    }

    public function setDelete($attrs)
    {
        $currentBook = $this->find('first',array('conditions'=>array('Book.id'=>$attrs['book_id'])));
        $currentUser = CakeSession::read('User');
        if (!empty($currentBook) && $currentUser['id'] == $currentBook['User']['id']){
            // var_dump($currentBook);
            $this->id = $currentBook['Book']['id'];
            $this->set('state','delete');
            if (isset($attrs['delete_detail'])){
                $this->set('result_detail',$attrs['delete_detail']);
            }
            $this->set('title',$currentBook['Book']['title']);
            $this->save();

            if ($currentBook['Book']['user_all_count'] > 1){
            	$this->User->set('book_delete',++$currentBook['User']['book_delete']);
                $this->User->save();
            }
            if (!empty($currentBook['Bet'])) {
                $this->returnBets($currentBook['Bet']);
            }
            return true;
        } else {
            return false;
        }
    }

    public function seTimeover($book_id)
    {
        $currentBook = $this->find('first',array('conditions'=>array('Book.id'=>$book_id)));
        if (!empty($currentBook)){
            $this->id = $currentBook['Book']['id'];
            $this->set('timeover_info',1);
            $this->set('state','Timeover');
            $this->save();

            if ($currentBook['Book']['user_all_count'] > 1){
            	$this->User->id = $currentBook['User']['id'];
                $this->User->set('result_timeover',++$currentBook['User']['result_timeover']);
                $this->User->save();
            }
            if (!empty($currentBook['Bet'])) {
                $this->returnBets($currentBook['Bet']);
            }
            return true;
        } else {
            return false;
        }
    }

    public function returnBets($bets)
    {
        foreach($bets as $bet){
            $passbook = array();
            $passbook['book_id'] = $bet['book_id'];
            $passbook['content_id'] = $bet['content_id'];
            $passbook['user_id'] = $bet['user_id'];
            $passbook['bet_id'] = $bet['id'];
            $passbook['point'] = $bet['betpoint'];
            $passbook['event'] = 'return';
            $this->Passbook->pointOperation($passbook);
        }
    }

    public function copyBook($attrs)
    {	
        return $this->find('first',array('conditions'=>array('Book.id'=>$attrs)));
        /* Once, leave. not work.
		$currentBook = $this->find('first',array('conditions'=>array('Book.id'=>$attrs['book_id'])));
        $currentUserid = CakeSession::read('User.id');
		
        if (!empty($currentBook) && $currentUserid == $currentBook['Book']['user_id']){    
			unset($currentBook['User']);
			unset($currentBook['Bet']);
			unset($currentBook['Passbook']);
			unset($currentBook['TimeZone']);
			$content = array();
			$book = array();
			$book['Book']['title'] = $currentBook['Book']['title'];
			$book['Book']['user_id'] = $currentBook['Book']['user_id'];
			$book['Book']['announcement_type'] = $currentBook['Book']['announcement_type'];
            $book['Book']['announcement'] = $currentBook['Book']['announcement'];
            $book['Book']['announcement_name'] = $currentBook['Book']['announcement_name'];
            $book['Book']['result_detail'] = $currentBook['Book']['result_detail'];
            $book['Book']['time_zone'] = $currentBook['Book']['time_zone'];
            $book['Book']['category'] = $currentBook['Book']['category'];
            $book['Book']['state'] = 'Up Coming';
			if(isset($currentBook['Content']) && !empty($currentBook['Content'])) {
				foreach($currentBook['Content'] as $key=>$val) { 
					unset($val['book_id']);
					unset($val['bet_total']);
					unset($val['user_count']);
					unset($val['id']);
					unset($val['created']);
					unset($val['modified']);
					$content['Content'][] = $val;
				}
				$data = array("Book"=>$book["Book"],"Content"=>$content["Content"]);
			} else {
				$data = array("Book"=>$book["Book"]);
			}
			$data = array("Book"=>$book["Book"],"Content"=>$content["Content"]);
			$this->create();
            $this->saveAll($data);
            return $this->getLastInsertId();
        }
        */
    }


    public function changeOddsAllContents($book_id = NULL)
    {
		App::import('model','Content');
        $currentBook = $this->find('first',array('conditions'=>array('Book.id'=>$book_id)));
		$data = array();
		if (!empty($currentBook)){
            $book_bet_all_total = $currentBook['Book']['bet_all_total'];
			if(!empty($book_bet_all_total)) { 
				foreach($currentBook['Content'] as $content){
					if(!empty($content['bet_total'])) {
						$cnt = 1/($content['bet_total']/($book_bet_all_total*0.99));
						$data['Content'][$content['id']] = array("id"=>$content['id'],"odds"=>$cnt);
					} else {
						$data['Content'][$content['id']] = array("id"=>$content['id'],"odds"=>1.00);
					}
				}
			}
			if(!empty($data)) {
				$this->Content->create();
				$this->Content->saveAll($data['Content']);
			}
            return true;
        } else {
            return false;
        }
    }

    public function isMakeBook(){
        if($this->User->updateSession()){
            return true;
        }else{
            return false;
        }
    }

}
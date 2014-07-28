 <?php
App::uses('AppModel','Model');

class Book extends AppModel {
    public $name = 'Book';
    public $useTable = 'books';
    public $belongsTo = 'User';
    public $actsAs = array('Search.Searchable');
    public $hasMany = array(
        'Content' => array(
            'className' => 'Content',
            'order' => 'Content.created DESC'
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
        'bet_finish'  => array(
            'identical'=>array(
                    'rule'       =>array('checkBetFinish'),
                    'message'    => 'Enter a valid date',
                )
            )
    );

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

    public function createNewBook($data,$user)
    {
        $formData = $data['data'];
        $this->set('user_id',$user['id']);
        $this->set('bet_start',$formData['Book']['betStartDate'].' '.$formData['Book']['betStartTime'].':00');
        $this->set('bet_finish',$formData['Book']['betFinishDate'].' '.$formData['Book']['betFinishTime'].':00');
        $this->set('result_time',$formData['Book']['betResultDate'].' '.$formData['Book']['betResultTime'].':00');
        $this->set('time_zone',$data['timeZone']);
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
            return $this->getLastInsertId();
        } else {
            $errors = $this->validationErrors;
            $errors['content'][] = 'Required 2 book content';
            return $errors;
        }
    }

    public function setWinner($attrs)
    {
        $currentUser = CakeSession::read('User');
        // $currentBook = $this->find('first',array('condition'=>array('Book.id'=>$attrs['book_id'])));
        $currentContent = $this->Content->find('first',array('conditions'=>array('Content.id'=>$attrs['content_id'])));

        if (!empty($currentContent)) {
            $reward_point = floor($currentContent['Book']['bet_all_total'] * 0.01);
            if ($reward_point <= 0) $reward_point = 0;


            $this->id = $attrs['book_id'];
            $this->set('state','result');
            $this->set('result_detail',$attrs['result_detail']);
            $this->set('win_contents_id',$attrs['content_id']);
            $this->set('reward_point',$reward_point);
            $this->set('title',$currentContent['Book']['title']);

            $this->save();


            if (!empty($currentContent['Bet'])){
                $maxBetValue = 0;
                $maxBetKey = 0;
                foreach($currentContent['Bet'] as $betSetsKey=>$bet) {
                    if ($maxBetValue < $bet['betpoint']) {
                        $maxBetValue = $bet['betpoint'];
                        $maxBetKey = $betSetsKey;
                    }
                }
                $betWin = $currentContent['Bet'][$maxBetKey];

                $this->Passbook->create();
                $this->Passbook->set('book_id',$attrs['book_id']);
                $this->Passbook->set('content_id',$attrs['content_id']);
                $this->Passbook->set('user_id',$betWin['user_id']);
                $this->Passbook->set('bet_id',$betWin['id']);
                $this->Passbook->set('point',$betWin['betpoint']);
                $this->Passbook->set('balance',0);
                $this->Passbook->set('event','win');
                $this->Passbook->save();
            }

            $this->Passbook->create();
            $this->Passbook->set('book_id',$attrs['book_id']);
            $this->Passbook->set('content_id',$attrs['content_id']);
            $this->Passbook->set('user_id',$currentUser['id']);
            $this->Passbook->set('point',$reward_point);
            $this->Passbook->set('balance',0);
            $this->Passbook->set('event','reward');
            $this->Passbook->save();

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

            if (!empty($currentBook['Bet'])) {
                $this->User->id = $currentBook['User']['id'];
                $this->User->set('book_delete',++$currentBook['User']['book_delete']);
                $this->User->save();

                // $this->Passbook->create();
                // $this->Passbook->set('book_id',$attrs['book_id']);
                // $this->Passbook->set('content_id',$attrs['content_id']);
                // $this->Passbook->set('user_id',$currentUser['id']);
                // $this->Passbook->set('point',$reward_point);
                // $this->Passbook->set('balance',0);
                // $this->Passbook->set('event','reward');
                // $this->Passbook->save();
            }
            return true;
        } else {
            return false;
        }
    }

    public function copyBook($attrs)
    {
        $currentBook = $this->find('first',array('conditions'=>array('Book.id'=>$attrs['book_id'])));
        $currentUser = CakeSession::read('User');
        if (!empty($currentBook) && $currentUser['id'] == $currentBook['User']['id']){
            unset($currentBook['Model']['id'] /* further ids */);
            $this->create();
            $this->saveAll($currentBook);
            return $this->getLastInsertId();
        }
    }

    public function setTimeOver($attrs)
    {
        $currentBook = $this->find('first',array('conditions'=>array('Book.id'=>$attrs['book_id'])));
        if (!empty($currentBook)){
            $this->id = $currentBook['Book']['id'];
            $this->set('title',$currentBook['Book']['title']);
            $this->set('state','Time over');
            $this->save();
            return true;
        } else {
            return false;
        }
    }
}
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
                'rule'     => 'alphaNumeric',
                'required' => true,
                'message'  => 'Letters and numbers only'
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
        $this->set('state','');
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
}
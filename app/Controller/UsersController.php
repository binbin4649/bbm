<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
	function beforefilter(){
		parent::beforefilter();
	}
    public function logout()
    {
        $this->Session->delete('FB');
        $this->Session->delete('User');

        $this->Session->destroy();
        $this->redirect('/');
    }

    public function facebook_login()
    {
        $user = $this->Connect->user();
        if ($user) {
            $userResponse = $this->User->saveFBUser($user);
            $this->Session->write('User',$userResponse['User']);
            if ($userResponse['User']['login_count'] == 2){
                $this->redirect('/#more_point');
            }
        }
        $this->redirect('/');
    }


    public function view($id)
    {
        $currentUser = $this->User->find('first',array('conditions'=>array('User.id'=>$id)));
        if (!empty($currentUser)) {
            foreach($currentUser['Bet'] as $betKey=>$bet) {
                $currentBet = $this->User->Bet->find('first',array('conditions'=>array('Bet.id'=>$bet['id'])));
                $currentUser['Bet'][$betKey]['book'] = $currentBet['Book'];
            }

            $result_timeover_count = $this->User->Book->find('count',array('conditions'=>array('LOWER(Book.state)'=>'time over')));
            $makebook_count = $this->User->Book->find('count',array('conditions'=>array('Book.user_id'=>$id)));
            $data = $currentUser;

            $passbooks = array();
            $passbook_count = 5;
            if(count($currentUser['Passbook']) < 5){ $passbook_count = count($currentUser['Passbook']); }
            for ($i = 0; $i < $passbook_count; $i++){ $passbooks[$i]['Passbook'] = $currentUser['Passbook'][$i]; }
            $this->set('passbooks',$passbooks);
            
            $betlists = array();
            $betlist_count = 5;
            if(count($currentUser['Bet']) < 5){ $betlist_count = count($currentUser['Bet']); }
            for ($i = 0; $i < $betlist_count; $i++){ 
                $betlists[$i]['Bet'] = $currentUser['Bet'][$i];
                $betlists[$i]['Book'] = $currentUser['Bet'][$i]['book'];
            }
            $this->set('betlists',$betlists);

            $books = array();
            $book_count = 5;
            if(count($currentUser['Book']) < 5){ $book_count = count($currentUser['Book']); }
            for ($i = 0; $i < $book_count; $i++){ $books[$i]['Book'] = $currentUser['Book'][$i]; }
            $this->set('books',$books);

            $this->set(compact("data"));
            $this->set("title_for_layout",'Profile - Home');
            $this->set('user',$currentUser);
            $this->set('result_timeover_count',$result_timeover_count);
            $this->set('makebook_count',$makebook_count);
            $this->User->updateSession();
            $this->render('profile-home');
            //$this->render(implode('/', ['profile']));
        }

    }

    public function userRankings()
    {
        $this->render('user-rankings');

    }
	
	function profile($type = 'profile',$user_id = null) {
		$title_arr = array("profile"=>"Profile","passbooks"=>"Passbooks","makedbooks"=>"Makedbooks","betlists"=>"Betlists");
		$this->set("title_for_layout",$title_arr[$type]);
		$this->User->recursive = -1;
		$data = $this->User->find("all",array("conditions"=>array("User.id"=>$user_id)));
		//$this->Session->write("User",$data[0]['User']);
		
        /*
        if ( $type != 'profile' ) { 
			$flag = $this->authenticateuser($user_id);
			if( !$flag ) {
				$this->Session->setFlash("You are not authorize to see the page.");
				$this->redirect(SITE_LINK."profile/".$user_id);
			}
		}
        */
        
		if ( $type == 'profile' || $type == 'betlists' ) {
			$this->loadModel("Bet");
			$this->set('pagetitle','Profile - Betlist');
			$this->paginate = array(
				"order"=>array("Bet.created"=>"desc"),
				"limit"=>($type == 'profile')?5:20,
				//"fields"=>array("Bet.*","Book.*"),
				"recursive"=>"0"
			);
			$betconditions = array("Bet.user_id"=>$user_id);
			$this->set("betlists",$this->paginate('Bet',$betconditions));
		} 
		if ( $type == 'profile' || $type == 'passbooks' ) {
			$this->loadModel("Passbook");
			$this->set('pagetitle','Profile - Passbook');
			$this->paginate = array(
				"order"=>array("Passbook.created"=>"desc"),
				"limit"=>($type == 'profile')?5:20
			);
			$Passbookconditions = array("Passbook.user_id"=>$user_id);
			$this->set("passbooks",$this->paginate('Passbook',$Passbookconditions));
		}
		if ( $type == 'profile' || $type == 'makedbooks' ) {
			$this->loadModel("Book");
			$this->set('pagetitle','Profile - Book');
			$this->paginate = array(
				"order"=>array("Book.created"=>"desc"),
				"recursive"=>($type == 'profile')?"-1":'1',
				"limit"=>($type == 'profile')?5:20
			);
			$Bookconditions = array("Book.user_id"=>$user_id);
			$this->set("books",$this->paginate('Book',$Bookconditions));
		}
		$data = $data[0];
		//pr($user);
		$this->set(compact("data"));
		$this->render($type);
	}

    public function home()
    {
        return $this->profile('profile',$this->Session->read('User.id'));
    }
    public function edit($id=null)
    {
        $this->set('pagetitle','Profile - Betlist');
        if($this->request->is('put')) {
            $this->User->updateProfile($this->request->data);
            $this->User->updateSession();
            $this->redirect('/');
        } else {
            $data = array('User'=> $this->Session->read('User'));
            $this->set('timezone',$this->User->TimeZone->getArrayForSelectForm());
            $this->set(compact("data"));
            $this->render('profile-edit');
        }
    }
}

<?php
App::uses('AppController', 'Controller');
//App::uses('CakeTime', 'Utility');

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
                // foreach ($currentContent['Bet'] as $betKey => $bet) {
                //     $currentBet = $this->Book->Bet->find('first',array('conditions'=>array('Bet.id'=>$bet['id'])));
                //     $currentBook['Content'][$contentKey]['bets'][$betKey] = array('Bet'=>$currentBet['Bet'],'User'=>$currentBet['User']);
                // }
            }

            $result_timeover_count = $this->User->Book->find('count',array('conditions'=>array('LOWER(Book.state)'=>'time over')));
            $makebook_count = $this->User->Book->find('count',array('conditions'=>array('Book.user_id'=>$id)));
            $data = $currentUser;
            $this->set(compact("data"));
            $this->set('user',$currentUser);
            $this->set('result_timeover_count',$result_timeover_count);
            $this->set('makebook_count',$makebook_count);
            $this->render(implode('/', ['profile']));
        }

    }

    public function userRankings()
    {
        $this->render(implode('/', ['user-rankings']));

    }
	
	function profile($type = 'profile',$user_id = null) {
		$title_arr = array("profile"=>"Profile","passbooks"=>"Passbooks","makedbooks"=>"Makedbooks","betlists"=>"Betlists");
		$this->set("title_for_layout",$title_arr[$type]);
		$this->User->recursive = -1;
		$data = $this->User->find("all",array("conditions"=>array("User.id"=>$user_id)));
		if ( $type == 'profile' || $type == 'betlists' ) {
			$this->loadModel("Bet");
			$this->paginate = array(
				"order"=>array("Bet.created"=>"desc"),
				"limit"=>($type == 'profile')?5:20,
				"fields"=>array("Bet.*","Book.*"),
				"recursive"=>"0"
			);
			$betconditions = array("Bet.user_id"=>$user_id);
			$this->set("betlists",$this->paginate('Bet',$betconditions));
		} 
		if ( $type == 'profile' || $type == 'passbooks' ) {
			$this->loadModel("Passbook");
			$this->paginate = array(
				"order"=>array("Passbook.created"=>"desc"),
				"limit"=>($type == 'profile')?5:20
			);
			$Passbookconditions = array("Passbook.user_id"=>$user_id);
			$this->set("passbooks",$this->paginate('Passbook',$Passbookconditions));
		}
		if ( $type == 'profile' || $type == 'makedbooks' ) {
			$this->loadModel("Book");
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
        if($this->request->is('put')) {
        var_dump('here1');
        var_dump($this->request->data['User']);
        $this->User->id = $this->Session->read('User.id');
        $this->User->set('mail',$this->request->data['User']['mail']);
        $this->User->set('profile',$this->request->data['User']['profile']);
        $this->User->set('name',$this->request->data['User']['name']);
        $this->User->set('default_rate',$this->request->data['User']['default_rate']);
        $this->User->set('language',$this->request->data['User']['language']);
        $this->User->save();
        $this->User->updateSession();
        $this->redirect('/');

        } else {
            $data = array('User'=> $this->Session->read('User'));
            $this->set(compact("data"));
            $this->render('profile-edit');
        }
    }
}

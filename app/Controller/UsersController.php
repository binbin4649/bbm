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
            $this->set('user',$currentUser);
            $this->set('result_timeover_count',$result_timeover_count);
            $this->set('makebook_count',$makebook_count);
            $this->render(implode('/', ['profile-home']));
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
		$data = $this->User->find("all",array("conditions"=>array("User.id"=>1)));
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
}

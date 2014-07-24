<?php
App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');


class UsersController extends AppController {
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
}

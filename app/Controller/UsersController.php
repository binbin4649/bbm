<?php
App::uses('AppController', 'Controller');


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
}

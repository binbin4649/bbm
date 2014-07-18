<?php
App::uses('AppController', 'Controller');


class UsersController extends AppController {
    public function logout()
    {
        $this->Session->delete('FB');
        $this->Session->destroy();
        $this->redirect('/');
    }

    public function facebook_login()
    {
        $user = $this->Connect->user();
        if ($user) {
            $this->User->saveFBUser($user);
        }
        $this->redirect('/');


    }
}

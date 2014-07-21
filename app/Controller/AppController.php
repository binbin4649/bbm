<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $helpers = array('Facebook.Facebook');
    var $components = array('Session', 'Facebook.Connect');

    function beforeFilter() {
        // $this->Auth->allow('*');
        $this->set('fbuser',$this->Connect->user());


    }

    function beforeFacebookSave() {
    }

    function beforeFacebookLogin($user) {
        //Logic to happen before a facebook login
    }

    function afterFacebookLogin() {
        $this->redirect(array('controller' => 'pages', 'action' => 'home'));
        //Logic to happen after successful facebook login.
    }



    // //Add an email field to be saved along with creation.
    // function beforeFacebookSave(){
    //     $this->Connect->authUser['User']['email'] = $this->Connect->user('email');
    //     return true; //Must return true or will not save.
    // }

    // function beforeFacebookLogin($user){
    // //Logic to happen before a facebook login
    // }

    // function afterFacebookLogin(){
    //     //Logic to happen after successful facebook login.
    //     $this->redirect('/custom_facebook_redirect');
    // }
}

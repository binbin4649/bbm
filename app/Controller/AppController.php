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
App::uses('CakeTime', 'Utility');

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
    var $components = array('Session', 'Facebook.Connect','Paginator');

    function beforeFilter() {
        // $this->Auth->allow('*');

        $this->set('fbuser',$this->Connect->user());
		if(!defined('SITE_LINK')) {
			define("SITE_LINK", "http://".$_SERVER['SERVER_NAME'].$this->params->base."/");
			define("FILE_LINK", "http://".$_SERVER['SERVER_NAME'].$this->params->base."/");
		}
        if($this->request->is('mobile')){
            $this->theme = 'Jqm';
            $this->layout = 'jqm';
        }
		if ($this->params['controller'] == 'admins' || $this->params['prefix'] == 'admin') {
			//$this->Auth->allow();			
			$this->userInfo = $this->Session->read('admin.Admin') ;
			if(empty($this->userInfo)) $this->userInfo = $this->Session->read('admin.User') ;
			$this->prefix = 'admin' ;			
			$this->layout="admin";
			$this->adminbreadcrumb();
		} else {
			
		}
		$this->loadModel('Update');
		$updates = $this->Update->find('all', array('limit' => 5, 'order' => 'Update.created DESC', 'recursive' => -1));
		$this->set('update_info',$updates);
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



    public function sendJson($response)
    {
        $this->autoRender = false;
        $this->response->type('json');
        $json = json_encode($response);
        $this->response->body($json);
    }
	
	
	/*
 * @function name	: encryptpass
 * @purpose			: encrypt a password for admin for custom login check
 * @arguments		: Following are the arguments to be passed:
	 password to encrypt as $password
	 encryption method as $method 
	 $crop to define if encrypted password will be croped or not if true then croped otherwise not
	 $start and $stop will define starting and ending point of croping
 * @return			: encrypted password
 * @created by		: Shiv Ram
 * @created on		: 28th July 2014
 * @description		: while encrypting password,password has been encrypted then croped and then again encrypted to make it more secure because even in md5 encryption if a user is setting some random password like 123456 etc can be decrypted using some online tools
*/
	function encryptpass($password,$method = 'md5',$crop = true,$start = 4, $end = 10){
		if($crop){
			$password = $method(substr($method($password),$start,$end));
		}else{
			$password = $method($password);
		}
		return $password;
	}
/* end of function */


/*
* @function name : checklogin
* @purpose : redirect to dashboard if user is already login and trying to access login page or forgotpassword page
* @arguments : none
* @return : none
* @created by : shiv ram
* @created on : 28th july 2014
* @description : NA
*/
function checklogin($action = array()) {
	if ($this->params['controller'] == 'admins' || (isset($this->params['prefix']) && $this->params['prefix'] == 'admin')) {
		$currentAction = $this->params['action'];
		if (!in_array($currentAction,$action)) {
			if($this->Session->read('admin.Admin')) {

			} else {
				$this->redirect("/admin");
			}
		}
	}
}
/* end of function */

/*
 * @function name	: adminbreadcrumb
 * @purpose			: to create bread crumb of admin module
 * @arguments		: none
 * @return			: none
 * @created by : shiv ram
 * @created on : 28th july 2014
 * @description		: NA
*/
	function adminbreadcrumb(){
		$this->loadModel("Breadcrumb");
		$breadcrumb = $this->Breadcrumb->find("all",array("conditions"=>array("controller"=>$this->params['controller'],"action"=>$this->params['action'])));
		if(!empty($breadcrumb)) {
			$this->set("breadcrumb",$breadcrumb);
		}
	}
/* end of function */

	function authenticateuser($user_id = NULL) {
		$flag = true;
		if ( !$this->Session->read("User.id") ) {
			$flag = false;
		} elseif ( $this->Session->read("User.id") != $user_id ) {
			$flag = false;
		}
		return $flag;
	}

}

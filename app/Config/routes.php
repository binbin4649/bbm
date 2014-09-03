<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'Books', 'action' => 'index', 'home'));
    // Router::connect('/index', array('controller' => 'Books', 'action' => 'index', 'home'));
    // Router::connect('/books/add', array('controller' => 'Books', 'action' => 'add'));
    Router::mapResources('books');
    Router::mapResources('bets');
    Router::mapResources('users');

    // Router::connect('/test', array('controller' => 'Books', 'action' => 'test', 'home'));
    // Router::connect('/user-rankings', array('controller' => 'Users', 'action' => 'userRankings', 'home'));





/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

	Router::connect('/update/*', array('controller' => 'updates'));
    Router::connect('/users/logout', array('controller' => 'users', 'action' => 'logout'));
    Router::connect('/users/facebook_login', array('controller' => 'users', 'action' => 'facebook_login'));
    Router::connect('/profile/edit', array('controller' => 'users', 'action' => 'edit'));
    Router::connect('/profile/home', array('controller' => 'users', 'action' => 'home'));
    Router::connect('/passbooks/*', array('controller' => 'users', 'action' => 'profile','passbooks'));
   // Router::connect('/profile/*', array('controller' => 'users', 'action' => 'profile','profile'));
    Router::connect('/betlists/*', array('controller' => 'users', 'action' => 'profile','betlists'));
    Router::connect('/makedbooks/*', array('controller' => 'users', 'action' => 'profile','makedbooks'));
    Router::connect('/admin', array('controller' => 'admins', 'action' => 'login'));
	Router::connect('/admin/dashboard', array('controller' => 'admins', 'action' => 'dashboard'));
	Router::connect('/admin/forgotpassword', array('controller' => 'admins', 'action' => 'forgotpassword'));
	Router::connect('/admin/changepassword', array('controller' => 'admins', 'action' => 'changepassword'));
	Router::connect('/admin/confirmation/*', array('controller' => 'admins', 'action' => 'confirmation'));
	Router::connect('/admin/configurations/*', array('controller' => 'admins', 'action' => 'configurations'));
	Router::connect('/admin/editprofile', array('controller' => 'admins', 'action' => 'editprofile'));
	Router::connect('/admin/logout', array('controller' => 'admins', 'action' => 'logout'));
	Router::connect('/switch_view/*', array('controller' => 'pages', 'action' => 'viewswitcher'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';


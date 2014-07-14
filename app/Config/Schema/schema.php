<?php 
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $bets = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'book_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'content_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'betpoint' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'result_point' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

	public $books = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'comment' => 'book create user'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 320, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'bet_all_total' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'user_all_count' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'state' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'category' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'bet_start' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'bet_finish' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'result_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'time_zone' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'comment' => 'ex)1 it mean  UTC+1'),
		'result_time_info' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1, 'comment' => '0=false,1=true'),
		'timeover_info' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1, 'comment' => '0=false,1=true'),
		'details' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'announcement_type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'announcement' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'announcement_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 320, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'result_detail' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'win_contents_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'reward_point' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'updates_info' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1, 'comment' => '0=false,1=true'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

	public $contents = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'book_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 320, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'no' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'comment' => 'Alignment sequence'),
		'odds' => array('type' => 'float', 'null' => false, 'default' => '1'),
		'bet_total' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'user_count' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

	public $passbooks = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'book_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'content_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'bet_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'point' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'balance' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'event' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'comment' => 'ex) bet', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

	public $updates = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'book_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'event' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_unicode_ci', 'comment' => 'ex) bet_start', 'charset' => 'utf8'),
		'content' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

	public $users = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'comment' => 'first input. facebook_username', 'charset' => 'utf8'),
		'facebook_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'facebook_link' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'facebook_link_hide' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 1, 'comment' => '0=false, 1=true'),
		'facebook_username' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'facebook_gender' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'facebook_mail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'mail' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'comment' => 'first input. facebook_mail', 'charset' => 'utf8'),
		'point' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 20),
		'betlist' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'makedbook' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'book_delete' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'result_timeover' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'profile' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'first input. facebook_bio', 'charset' => 'utf8'),
		'default_rate' => array('type' => 'integer', 'null' => false, 'default' => '10', 'length' => 4),
		'facebook_auto_post' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 1, 'comment' => '0=false, 1=true'),
		'mail_submit' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 1, 'comment' => '0=false, 1=true'),
		'time_zone' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 40, 'collate' => 'utf8_unicode_ci', 'comment' => 'ex)1 it mean  UTC+1', 'charset' => 'utf8'),
		'language' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_unicode_ci', 'comment' => 'ex) english', 'charset' => 'utf8'),
		'facebook_like_point' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1, 'comment' => '0=false, 1=true'),
		'login_count' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

}

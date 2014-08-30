 <?php
App::uses('AppModel','Model');

class TimeZone extends AppModel {
    public $name = 'TimeZone';
    public $useTable = 'time_zones';
    public $hasMany = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'time_zone',
            'order' => 'User.created DESC'
        ),
        'Book' => array(
            'className' => 'User',
            'foreignKey' => 'time_zone',
            'order' => 'Book.created DESC'
        )
    );

    public function getArrayForSelectForm()
    {
        $zones = $this->find('all');
        $time_zones = array();
        foreach($zones as $zone) {
            $time_zones[$zone['TimeZone']['id']] = $zone['TimeZone']['title'];
        }
        return $time_zones;
    }
}
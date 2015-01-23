<?php
App::uses('AppModel', 'Model');
/**
 * AgencysiteSetting Model
 *
 * @property User $User
 */
class AgencysiteSetting extends AppModel {


	
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

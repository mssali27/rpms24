<?php
App::uses('AppModel', 'Model');
/**
 * Business Model
 *
 * @property Business $ParentBusiness
 * @property BusinessCategory $BusinessCategory
 * @property BusinessEmployee $BusinessEmployee
 * @property BusinessReview $BusinessReview
 * @property BusinessSocialMedia $BusinessSocialMedia
 * @property Business $ChildBusiness
 * @property Customer $Customer
 * @property EmailTemplate $EmailTemplate
 * @property FeedbackSetting $FeedbackSetting
 * @property Visibility $Visibility
 */
class Business extends AppModel {
var $virtualFields = array('totalReviews'=>'SELECT COUNT(*) FROM business_reviews br WHERE br.business_id = Business.id','lastReviewdate'=>'SELECT `ratingdate` FROM business_reviews br WHERE br.business_id = Business.id ORDER BY br.id DESC LIMIT 1','averageRating'=>'SELECT AVG(`ratingstar`) FROM business_reviews br WHERE br.business_id = Business.id ');	
public $actsAs = array('Containable');
/**
 * Validation rules
 *
 * @var array
 */


		
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentBusiness' => array(
			'className' => 'Business',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BusinessCategory' => array(
			'className' => 'BusinessCategory',
			'foreignKey' => 'business_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'State' => array(
			'className' => 'State',
			'foreignKey' => 'state',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'City' => array(
			'className' => 'City',
			'foreignKey' => 'city',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)

	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'BusinessEmployee' => array(
			'className' => 'BusinessEmployee',
			'foreignKey' => 'business_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'BusinessReview' => array(
			'className' => 'BusinessReview',
			'foreignKey' => 'business_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'BusinessSocialMedia' => array(
			'className' => 'BusinessSocialMedia',
			'foreignKey' => 'business_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		/*'ChildBusiness' => array(
			'className' => 'Business',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),*/
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'business_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EmailTemplate' => array(
			'className' => 'EmailTemplate',
			'foreignKey' => 'business_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'FeedbackSetting' => array(
			'className' => 'FeedbackSetting',
			'foreignKey' => 'business_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
		/*'Visibility' => array(
			'className' => 'Visibility',
			'foreignKey' => 'business_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)*/
	);

}

<?php
App::uses('AppModel', 'Model');
/**
 * PostsTag Model
 *
 */
class PostsTag extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'post_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'tag_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		)
	);

	public $belongsTo = array(
		'Tag' => array(
			'classname' => 'Tag',
			'foreignKsy' => 'tag_id'
		),
		'Post' => array( 
			'classname' => 'Post',
			'foreignkey' => 'post_id'
		)
	);

}

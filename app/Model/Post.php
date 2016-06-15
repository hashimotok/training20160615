<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property User $User
 */
class Post extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			//'conditions' => '',
			//'fields' => '',
			//'order' => ''
		 ),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
		)
	);

	public $hasAndBelongsToMany = array(
		'Tag' => array(
                        'className' => 'Tag',
                        'joinTable' => 'posts_tags',
                        'foreignKey' => 'post_id',
                        'associationForeignKey' => 'tag_id',
                        'unique' => 'true',
                        'conditions' => '',
                        'fields' => '',
                        'order' => '',
                        'limit' => '',
                        'offset' => '',
                        'finderQuery' => '',
		)
	);

	public $hasMany = array (
	#	'Image' => array( //プラグイン使用しない場合
	#		'className' => 'Image',
	#		'foreignKey' => 'post_id',
	#	),
		'Image' => array(
			'className' => 'Attachment',
			'foreignKey' => 'post_id',
		)
	);

	public function isOwnedBy($post, $user) {
          return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
	}

	// Search Plugin
	public $actsAs = array('Search.Searchable');
	
	// $filterArgs 検索のタイプ指定
	public $filterArgs = array(
		'title' => array('type' => 'like'),
                'category_id' => array('type' => 'value'),
		'tags' => array('type' => 'query', 'method' => 'findByTags'),
	);

	public function findByTags($data = array()) {
      		$postIds = $this->PostsTag->find('list', array(
        		'fields' => 'PostsTag.post_id',
        		'conditions' => array('PostsTag.tag_id' => $data['tags']),
      		));
     		$condition[1] = array(
     			'Post.id' => $postIds,
      		);
     		 return $condition;
	}

    public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        )
    );
}

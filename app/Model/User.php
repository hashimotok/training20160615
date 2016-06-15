<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Group $Group
 * @property Post $Post
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
        ),
        'username' => array(
            'rule' => array('isUnique'),
            'message' => 'このユーザは既に登録されています。',
            'required' => true
        ),
        'password' => array(
            'rule' => 'notBlank',
            'required' => true
        ),
        'address_id' => array(
            'rule' => 'notBlank',
            'required' => true,
            'message' => '郵便番号から検索してください。'
        )
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
        'Group', 
        'Address' =>array(
            'className' => 'Address',
            'foreignKey' => 'address_id'
        )
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
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
	);
	
	function beforeSave($options = array()) {
        	$this->data['User']['password'] = AuthComponent::password(
          	$this->data['User']['password']
        	);
        	return true;
    	}

    public $actsAs = array('Acl' => array('type' => 'requester' , 'enabled' => false));
	// 'enabled' => false コールバックの起動を無効化 user登録時にaroに登録されない

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }

    public function bindNode($user) {
	return array('model' => 'Group' , 'foreign_key' => $user['User']['group_id']);
    }
}

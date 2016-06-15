<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class PostsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Search.Prg');
	public $helpers = array('Html');
	public $name = 'Posts';
	public $presetVars = true;

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Post->recursive = 0;
		$this->Prg->commonProcess();
       		$this->paginate = array(
           		 'conditions' => $this->Post->parseCriteria($this->passedArgs),
        	);
		$this->set('posts', $this->Paginator->paginate());
		$this->set('categories', $categories = $this->Post->Category->find('list'));
                $this->set('tags' , $tags = $this->Post->Tag->find('list'));
	}


	public function searchTags() {
        $this->autoRender = false;
        return $this->Post->Tag->find('list');
	}
    public function searchCategories() {
        $this->autoRender = false;
		return $this->Post->Category->find('list');
	}



/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			$this->request->data['Post']['user_id'] = $this->Auth->user('id');
			if(!empty($this->request->data['Image'][0]['attachment']['name'])) {
                        	if ($this->Post->saveAll($this->request->data)) {
                                	$this->Flash->success(__('The post has been saved.'));
                    	           	return $this->redirect(array('action' => 'index'));
                        	} else {
                                $this->Flash->error(__('The post could not be saved. Please, try again.'));
                        	}
			} else {
				if ($this->Post->save($this->request->data)) {
					$this->Flash->success(__('The post has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Flash->error(__('The post could not be saved. Please, try again.'));
				}
			}
		}
		$categories = $this->Post->Category->find('list');
		$this->set(compact('categories'));
 		$this->set('tags' , $tags = $this->Post->Tag->find('list'));
	}

/**
 * _saveimage method
 *
 * plugin使わずuploadするメソッド
 * 
	public function _saveimage($requestdata , $id) {
		$images = $requestdata['Post']['image'];
		if(!empty($images['tmp_name'])) {
                   $requestdata['Post']['Image']['post_id'] = $id;
		   foreach($images as $image) {
		       $this->Post->Image->create();
   	               // Imageがあれば保存する
                       $requestdata['Post']['Image']['filename'] = md5(microtime()) . '.jpg';
                       $requestdata['Post']['Image']['contents'] = file_get_contents($image['tmp_name']);
			$this->Post->Image->save($requestdata['Post']['Image']);
		   }
                 }
	}
*/

/**
 * _saveimage method
 *
 * plugin使用してuploadするメソッド
 * 
 */
	public function _saveimage($requestdata) { 
                       if(!empty($this->request->data['Image'][0]['attachment']['name'])) {
                                if ($this->Post->saveAll($this->request->data)) {
                                        $this->Flash->success(__('The post has been saved.'));
                        #                return $this->redirect(array('action' => 'index'));
                                } else {
                                $this->Flash->error(__('The post could not be saved. Please, try again.'));
                                }
                        } else {
                                if ($this->Post->save($this->request->data)) {
                                        $this->Flash->success(__('The post has been saved.'));
                         #               return $this->redirect(array('action' => 'index'));
                                } else {
                                        $this->Flash->error(__('The post could not be saved. Please, try again.'));
                                }
                        }
	}



/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
        }
        if ($this->request->is(array('post', 'put'))) {
        //if(!empty($this->request->data)) {
		/*	if ($this->Post->saveAll($this->request->data)) {
				$this->Flash->success(__('The post has been saved.'));
		#		return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}*/
            //if(isset($this->request->data['Image'])) {
            foreach($this->request->data['Image'] as $count =>  $image) {
				if (isset($image['attachment']['id'])) {
					$this->Post->Image->save($image['attachment']);
					unset($this->request->data['Image'][$count]);
				}
            }
            //}
			$this->_saveimage($this->request->data);
            return $this->redirect(array('action' => 'index'));
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$post = $this->request->data = $this->Post->find('first', $options);
			$this->set('post' , $post);
		}
                $categories = $this->Post->Category->find('list');
                $this->set(compact('categories'));
		$this->set('tags' , $tags = $this->Post->Tag->find('list'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Post->id = $id; 
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete()) {
			$this->Flash->success(__('The post has been deleted.'));
		} else {
			$this->Flash->error(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index','view');
	}

	public function isAuthorized($user) {
		if($this->action === 'add') {
			return true;
		}
		if(in_array($this->action, array('edit','delete'))) {
			$postId = (int) $this->request->params['pass']['0'];

			if($this->Post->isOwnedBy($postId,$user['id'])) {
				return true;
			}
		}
		return parent::isAuthorized($user);
	}

	public function contents($filename) {
		$this->layout = false;
		$image = $this->Post->Image->findByFilename($filename);
		if(empty($image)) {
			$this->cakeError('error');
		}
		header('Content-type: image/jpeg');
		echo $image['Image']['contents'];
	}
}


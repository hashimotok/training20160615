<?php
App::uses('AppController', 'Controller');
/**
 * Addresses Controller
 *
 * @property Address $Address
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class AddressesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session', 'RequestHandler');
    public $helpers = array('Html');
    public $name = 'Addresses';

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->set('address','');
        
        #if($this->request->is('ajax')) {
            
        #}
	}

/**
 * search method
 *
 * @return void
 */
    public function search() {
        $this->autoRender = false;
        if($this->request->is('ajax')) {
        
            $addresses = $this->Address->find('list', array(
                'fields' => 
                    array('Address.address1', 'Address.address2','Address.id'),
                'conditions' => array('postnum' => $this->data['postnum'])
            ));
            return json_encode($addresses);
        }
    }


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Address->exists($id)) {
			throw new NotFoundException(__('Invalid address'));
		}
		$options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
		$this->set('address', $this->Address->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
		if ($this->request->is('post')) {
            $up_file = $this->request->data['Address']['csvFile']['tmp_name'];
			$fileName = 'files/image/csvfile/postCd.csv';

            if(is_uploaded_file($up_file)) {
                move_uploaded_file($up_file , $fileName);
				$this->Address->loadCsv($fileName);
                $this->Session->setFlash('Uploaded');
                $this->Flash->success(__('Upload Success'));
                $this->redirect(array('action' => 'index'));
            }else{
                $this->Flash->error(__('error'));
            }

			/*$this->Address->create();
			if ($this->Address->save($this->request->data)) {
				$this->Flash->success(__('The address has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The address could not be saved. Please, try again.'));
			}*/
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
		if (!$this->Address->exists($id)) {
			throw new NotFoundException(__('Invalid address'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Address->save($this->request->data)) {
				$this->Flash->success(__('The address has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The address could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Address.' . $this->Address->primaryKey => $id));
			$this->request->data = $this->Address->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Invalid address'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Address->delete()) {
			$this->Flash->success(__('The address has been deleted.'));
		} else {
			$this->Flash->error(__('The address could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

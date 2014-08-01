<?php
App::uses('AppController', 'Controller');
/**
 * Passbooks Controller
 *
 * @property Passbook $Passbook
 * @property PaginatorComponent $Paginator
 */
class PassbooksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Passbook->recursive = 0;
		$this->set('passbooks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Passbook->exists($id)) {
			throw new NotFoundException(__('Invalid passbook'));
		}
		$options = array('conditions' => array('Passbook.' . $this->Passbook->primaryKey => $id));
		$this->set('passbook', $this->Passbook->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Passbook->create();
			if ($this->Passbook->save($this->request->data)) {
				$this->Session->setFlash(__('The passbook has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The passbook could not be saved. Please, try again.'));
			}
		}
		$users = $this->Passbook->User->find('list');
		$books = $this->Passbook->Book->find('list');
		$contents = $this->Passbook->Content->find('list');
		$bets = $this->Passbook->Bet->find('list');
		$this->set(compact('users', 'books', 'contents', 'bets'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Passbook->exists($id)) {
			throw new NotFoundException(__('Invalid passbook'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Passbook->save($this->request->data)) {
				$this->Session->setFlash(__('The passbook has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The passbook could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Passbook.' . $this->Passbook->primaryKey => $id));
			$this->request->data = $this->Passbook->find('first', $options);
		}
		$users = $this->Passbook->User->find('list');
		$books = $this->Passbook->Book->find('list');
		$contents = $this->Passbook->Content->find('list');
		$bets = $this->Passbook->Bet->find('list');
		$this->set(compact('users', 'books', 'contents', 'bets'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Passbook->id = $id;
		if (!$this->Passbook->exists()) {
			throw new NotFoundException(__('Invalid passbook'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Passbook->delete()) {
			$this->Session->setFlash(__('The passbook has been deleted.'));
		} else {
			$this->Session->setFlash(__('The passbook could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Passbook->recursive = 0;
		$this->set('passbooks', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Passbook->exists($id)) {
			throw new NotFoundException(__('Invalid passbook'));
		}
		$options = array('conditions' => array('Passbook.' . $this->Passbook->primaryKey => $id));
		$this->set('passbook', $this->Passbook->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Passbook->create();
			if ($this->Passbook->save($this->request->data)) {
				$this->Session->setFlash(__('The passbook has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The passbook could not be saved. Please, try again.'));
			}
		}
		$users = $this->Passbook->User->find('list');
		$books = $this->Passbook->Book->find('list');
		$contents = $this->Passbook->Content->find('list');
		$bets = $this->Passbook->Bet->find('list');
		$this->set(compact('users', 'books', 'contents', 'bets'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Passbook->exists($id)) {
			throw new NotFoundException(__('Invalid passbook'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Passbook->save($this->request->data)) {
				$this->Session->setFlash(__('The passbook has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The passbook could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Passbook.' . $this->Passbook->primaryKey => $id));
			$this->request->data = $this->Passbook->find('first', $options);
		}
		$users = $this->Passbook->User->find('list');
		$books = $this->Passbook->Book->find('list');
		$contents = $this->Passbook->Content->find('list');
		$bets = $this->Passbook->Bet->find('list');
		$this->set(compact('users', 'books', 'contents', 'bets'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Passbook->id = $id;
		if (!$this->Passbook->exists()) {
			throw new NotFoundException(__('Invalid passbook'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Passbook->delete()) {
			$this->Session->setFlash(__('The passbook has been deleted.'));
		} else {
			$this->Session->setFlash(__('The passbook could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

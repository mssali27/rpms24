<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

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
	function beforeFilter(){
   		parent::beforeFilter();
   		$this->Auth->allow('forgot','resetPassword','checkUserEmail','validUserEmail');
	}

	
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	/**
 * login method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	 

	public function login() {

			if($this->Session->read('Auth.User')) {
                 $this->routing();
       	    }

			
			if ($this->request->is('post')) {
				if ($this->Auth->login()) {
					$usertype=$this->Session->read('Auth.User.usertype');
					$data['UserHistory']['user_id']=$this->Session->read('Auth.User.id');
					$this->loadModel('UserHistory');
					$this->UserHistory->save($data);
					switch ($usertype) {
						case 'reseller':
							$this->redirect($this->Auth->redirect('/dashboard'));
							break;

						case 'subscriber':
							$this->redirect($this->Auth->redirect('/dashboard/subscriber'));
							break;
						default:
							$this->Session->destroy();
		            		$this->redirect('/');
							break;
					}
				    //return $this->redirect($this->Auth->redirectUrl());
				    // Prior to 2.3 use
				    // `return $this->redirect($this->Auth->redirect());`
				} else {
					$this->Session->setFlash('Username or password is incorrect. Please try again.');
					$this->redirect($this->referer());
				 //    $this->Session->setFlash(
					// __('Username or password is incorrect'),
					// 'default',
					// array(),
					// 'auth'
				 //    );
				}
		    }

			  if ($this->Session->read('Auth.User')) {
			      
			       return $this->redirect($this->Auth->redirectUrl());
			  }
		}

		
		public function logout() {
			$this->Session->delete('User');
			return $this->redirect($this->Auth->logout());
		}


		public function forgot(){
			if($this->request->is('post')){
				$email=$this->request->data['User']['email'];
				$user=$this->checkEmail($email, 'User');
				if($user){
					$uid=$this->generateUniqueKey();
					$url=Router::url('/users/resetPassword?key='.$uid, true);
					$content="<a href=$url>Click here to reset your password.</a>";
	                $this->sendEmail($content,"support@repmgsys.com",$email);
	                $data=array();
	                $data['User']['id']=$user['User']['id'];
	                $data['User']['password_reset']=$uid;
	                $this->loadModel('User');
	                $this->User->save($data);
	                $this->Session->setFlash('Password reset link has been sent on your mail id.Please Check your email.');
					$this->redirect($this->referer());
				}else{
					$this->Session->setFlash('Email Id does not exist. Please try again.');
					$this->redirect($this->referer());
				}
			}else{
			    $this->render('forgot','default');	
			}
		}

		public function resetPassword(){
			if($this->request->is('post')){
				$uid=$this->request->data['User']['key'];
				//pr($this->request->params);die;
				$user=$this->User->find('first',array('conditions'=>array('password_reset'=>$uid)));
				//pr($user);die;
				if($user)
				{  // pr($this->request->data['User']);die;
					$pass=$this->request->data['User']['password'];
					$cpass=$this->request->data['User']['cpassword'];
					
						if($pass===$cpass){
							$data['User']['id']=$user['User']['id'];
							$data['User']['password']=$pass;
							$data['User']['password_reset']='';
							//pr($data);die;
							if($this->User->save($data)){
								$this->Session->setFlash('Password has been updated successfulluy.');
								$this->redirect(array('controller'=>'users','action'=>'login'));	
							}else{
								$this->Session->setFlash('!Opps, Something is wrong to update password.');
								$this->redirect($this->referer());	
							}
						}else{
							$this->Session->setFlash('Password does not match.');
							$this->redirect($this->referer());	
						}
					
					
				}else{
					$this->Session->setFlash('Invalid reset password link. Please try again.');
					$this->redirect($this->referer());	
				}
			}else{
				$data=array();
				$data['key']=$_GET['key'];
                $this->set('data', $data);
				$this->render('resetPassword','default');
			}
			
		}

		function checkUserEmail()
		{
			$email = trim($_REQUEST['data']['User']['email']);
			$this->autoRender = false;
			$count = $this->User->find('count',array('conditions'=>array('User.email'=>$email)));
			if($count>0)
			{
				echo "true";die;
			}
			else
			{
				echo "false";die;
			}	
		}

		function validUserEmail()
		{
			$email = trim($_REQUEST['data']['User']['email']);
			$this->autoRender = false;
			$count = $this->User->find('count',array('conditions'=>array('User.email'=>$email)));
			if($count>0)
			{
				echo "false";die;
			}
			else
			{
				echo "true";die;
			}	
		}

		
	}

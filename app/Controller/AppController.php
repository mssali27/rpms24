<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
	//echo Inflector::pluralize('business');die;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
		public $components = array('Session','Email',
	    'Auth' => array(
		'authenticate' => array(
		    'Form' => array(
		        'fields' => array('username' => 'email')
		    )
		)
	    )
	);
	
	var $helpers = array('Html', 'Form', 'Session' );
	function beforeFilter() {
		 //$this->Security->unlockedActions = array($this->request->action);  
		 //disable security component
		//$this->Auth->actionPath = 'controllers/';
		//update rating sidebar element
		$this->loadModel('Business');
		$businessesdata=$this->Business->find('all',array('contain'=>false,'order'=>array('Business.id'=>'DESC'),'fields'=>array('Business.id','Business.businessname','Business.totalReviews','Business.lastReviewdate','Business.averageRating'),'conditions'=>array('Business.agency_id'=>$this->Session->read('Auth.User.id'),'Business.is_deleted'=>0, 'Business.totalReviews !='=>0)));
		$this->set('businessesdata',$businessesdata);

		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
		$this->Auth->loginRedirect = array('controller' => 'dashboard', 'action' => 'index');
		
	} 
	public function routing(){
			$usertype=$this->Session->read('Auth.User.usertype');
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
			
		}
	function RandomStringGenerator($length = 8)
	{
	  $string = "";	  
	  $pattern = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		for($i=0; $i<$length; $i++)
		{
			$string .= $pattern{rand(0,61)};
		}
		
		return $string;
	}

	/**
*Function to send mail
*Author:MSS
*/
function sendEmail($email_template=null,$from=null,$to=null)
	{
		$template_info = $email_template;
		$to = trim($to);	
		$this->set('data',$template_info);
		$this->Email->to = $to;
		$this->Email->subject = $template_info;
		$this->Email->from = $from;
		$this->Email->template = 'default';
		$this->Email->sendAs = 'both'; 
		$this->Email->send($template_info);		
		
	}
/**
*Function to generate unique key.
*Author:MSS
*/	
function generateUniqueKey() {
        return md5(uniqid(rand(), true));
    }
    	
/**
*Function to check email
*Author:MSS
*/    
function checkEmail($email, $model){
	//die($model);
	$this->loadModel($model);
	$result = $this->$model->find('first',array('conditions'=>array('email'=>$email)));
	return $result;
}
public function beforeRender() {
     $this->response->disableCache();

}
function upload_image($dest,$file,$oldfile=NULL)
	{		
		$dest = realpath($dest);
		$name = str_replace(' ','_',$file['name']);
		$name = explode('.',$name);
		$name[0] = $name[0].'-'.time();
		$name = $name['0'].'.'.end($name);
		$location = $dest.'/'.$name;
		if(copy($file['tmp_name'],$location))
		{
			if($oldfile)
			{
				unlink($dest.'/'.$oldfile);
			}
			return $name;
		}
	}

}

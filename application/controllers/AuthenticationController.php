<?php
class AuthenticationController extends Zend_Controller_Action
{
	public function init(){
		$this->initView();
		$this->view->baseUrl=$this->_request->getBaseUrl();
        $userNamespace = new Zend_Session_Namespace('user');
        $sessionobj=$userNamespace->instance;
       if(SessionCheck::sessionCheckSum()!==0){
            $this->redirect('/index');
        }

}
	public function indexAction(){
		$this->redirect('/authentication/login');
	}
	function loginAction()
    {
        
        $this->view->error = '';
        if ($this->_request->isPost()) {
            // collect the data from the user
            Zend_Loader::loadClass('Zend_Filter_StripTags');
            $filter = new Zend_Filter_StripTags();
            $username = $filter->filter($this->_request->getPost('username'));
            $password = $filter->filter($this->_request->getPost('password'));
            
            if (empty($username)||empty($password)) {
                $this->view->error = 'Please provide a username or password.';

            } else {
                // setup Zend_Auth adapter for a database table
              try{
                Zend_Loader::loadClass('Zend_Auth_Adapter_DbTable');
                $db = Zend_Registry::get('db');
                //print_r($db);
                $authAdapter = new Zend_Auth_Adapter_DbTable($db);
                $authAdapter->setTableName('users');
                $authAdapter->setIdentityColumn('user_id');
                $authAdapter->setCredentialColumn('password');
                
                // Set the input credential values to authenticate against
                $authAdapter->setIdentity($username);
                $authAdapter->setCredential($password);
                
                // do the authentication 
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
                 //print_r(VendorSession::getUser());
                // print_r($result);
                if ($result->isValid()) {
                 $user = User::getInstanceFromUser($result);
                  VendorSession::setUser($user);
                    $this->_redirect('/index');
                }
                else {
                        throw new Exception('Incorrect username or Password, Please try again');
                    }
                 /*
                else {
                    // failure: clear database row from session
                    $this->view->message = 'Invalid username or password';
                }*/
            }
            catch (Exception $e){
                    $this->view->error = $e->getMessage();
                   // $this->view->error = $e;
                }
        }
        
        $this->view->title = "Log in";
        $this->render();
        
    }
}

}	


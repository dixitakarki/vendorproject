<?php
class AuthenticationController extends Zend_Controller_Action
{
	public function init(){
		$this->initView();
		$this->view->baseUrl=$this->_request->getBaseUrl();
	}
	public function indexAction(){
		$this->redirect('/login');
	}
    public function loginAction()
    {
    if ($this->_request->isPost()){
            Zend_Loader::loadClass('Zend_Filter_StripTags');
            $filter = new Zend_Filter_StripTags();
            if ($filter->filter($this->_request->getPost('username')) && $filter->filter($this->_request->getPost('password'))){
                
                try {
                    Zend_Loader::loadClass('Zend_Auth_Adapter_DbTable');
               $db = Zend_Registry::get('db');
               //print_r($db);
               // $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db::getDefaultAdapter);
               $authAdapter = new Zend_Auth_Adapter_DbTable($db);
                $authAdapter->setTableName('users');
                $authAdapter->setIdentityColumn('user_id');
                $authAdapter->setCredentialColumn('password');

                $authAdapter->setIdentity($this->getParameter('username'));
                $authAdapter->setCredential($this->getParameter('password'));
                    $auth = Zend_Auth::getInstance();
                    $result = $auth->authenticate($authAdapter);
                   if (true === $result->isValid()) {

                        /**
                        * @var Zend_Session_Namespace $authNamespace
                        */
                      //  $authNamespace = new Zend_Session_Namespace('auth');

                        /**
                        * @var User $user
                        */
                        $user = User::getInstanceFromUser($result);
                        //User::getInstanceFromUser();
                       Session::setUser($user);
                       
                      // print_r(User::getMyuser($result));
                      // print_r($mm->_username);
        
                        //$authNamespace->role = $user->getRole()->getRoleCode();
                    //print_r($userInfo);
                   $this->_redirect('/index');

                        //$this->_redirect('/');
                        
                    } else {
                        throw new Exception('Your username or Password is incorrect, Please try again');
                    }


                } catch (Exception $e){
                    self::_resetNamespaces();
                    $this->view->error = $e->getMessage();
                    //$this->view->error = $e;
                }
            } else {
                $this->view->error = 'Please enter a username and password.';
            }
        }
        
        /**
         * Display any passed in messages
         * @var Zend_Controller_Action_Helper_FlashMessenger $flashMessage
         */
        $flashMessage = $this->_helper->getHelper('FlashMessenger');
        if(($flashMessage->getMessages())){
        
        	$this->view->error = $flashMessage->getMessages();
        }  
    	
	$this->view->hello="welcome dixita";
	$this->view->title="Vendor Request System";
        }
		}
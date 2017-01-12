<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
       $this->initView();
	   $this->view->baseUrl=$this->_request->getBaseUrl();
    }

    public function indexAction()
    {
    	echo "hello";
 $a= new VendorSession();
 print_r($a->getSessionUser());
 $this->view->user=$a->getSessionUser();
        /*
        $userNamespace = new Zend_Session_Namespace('user');
        $userNamespace->lock();
        $sessionobj=$userNamespace->instance;
        $sessionuser=$sessionobj->getUsername();
        */
        // print_r( MySession::getSessionUser());
        /*
    	$userNamespace = new Zend_Session_Namespace('user');
        $sessionobj=$userNamespace->instance;*/
        /*
        $sessionobj=$userNamespace->instance;
        $sessionuser=$sessionobj->getUsername();
        return $sessionuser;*/
    	
        /*);
    	/*
        if($usersession){
        		echo "hello ".$usersession;
        }
        else{
        	$this->_redirect('/login');
        }*/
    }


}


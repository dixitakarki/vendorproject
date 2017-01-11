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
    	
    	$myuser=Session::getUser();
    	$usersession=$myuser->getUsername();
    	print_r($usersession);
    	/*
        if($usersession){
        		echo "hello ".$usersession;
        }
        else{
        	$this->_redirect('/login');
        }*/
    }


}


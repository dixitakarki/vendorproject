<?php

class NewController extends Zend_Controller_Action
{

    public function init()
    {
        $this->initView();
		$this->view->baseUrl=$this->_request->getBaseUrl();
    }

    public function indexAction()
    {
        $a= new VendorSession();
 print_r($a->getSessionUser());
 $this->view->user=$a->getSessionUser();
        // action body
		
		
    }


}


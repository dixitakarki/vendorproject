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

    }


}


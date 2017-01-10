<?php
class AuthenticationController extends Zend_Controller_Action
{
	public function init(){
		$this->initView();
		$this->view->baseUrl=$this->_request->getBaseUrl();
	}
    public function loginAction()
    {
	$this->view->hello="welcome dixita";
	$this->view->title="Vendor Request System";
        }
		}
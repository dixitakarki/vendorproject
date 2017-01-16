<?php
class NewController extends Zend_Controller_Action
{
    public function init()
    {
        
        $this->initView();
		$this->view->baseUrl=$this->_request->getBaseUrl();//gives the base url 
        if(SessionCheck::sessionCheckSum()===0)
        {
            $this->_redirect('/authentication');
        }else{
            $this->view->user=SessionCheck::sessionCheckSum();
        }
}
    public function indexAction()
    {
        $options = Input::getOptions();
        $this->view->categories = $options->category->toArray();    
        $this->view->countries = $options->country->toArray();
        $this->view->currencies = $options->currency->toArray();
        $this->view->paymentTerms = $options->payment->terms->toArray();
        $this->view->paymentMethods = $options->payment->method->toArray();
		 $session = new Zend_Session_Namespace('session');
         $this->view->errorLog=$session->errorArray;
         $this->view->currentForm=$session->currentForm;
         unset($session->errorArray);	
		$session = new Zend_Session_Namespace('session');
         if($session->errorComCode===""){
		 $this->view->errorComCode="";
		 }else{
            $this->view->errorComCode=$session->errorComCode;
            unset($session->errorComCode);
         }

    }
    
}


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
        
		 $session = new Zend_Session_Namespace('session');
         $this->view->errorLog=$session->errorArray;
         $this->view->currentForm=$session->currentForm;
         unset($session->errorArray);
//          if($session->errorComCode===""){
// 		 $this->view->errorComCode="";}
//          else{
//             $this->view->errorComCode=$session->errorComCode;
//             unset($session->errorComCode);
//          }
// if($session->errorPurCode===""){
// $this->view->errorPurCode="";
// }
//          else{
            
//             $this->view->errorPurCode=$session->errorPurCode;
            
//             unset($session->errorPurCode);
//          }
    }
    
}


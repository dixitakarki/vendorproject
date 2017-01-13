  <?php
  class ValidateController extends Zend_Controller_Action{
  	function validateAction(){
         $errorCompanyCode="";
         $session = new Zend_Session_Namespace('session');
        $validator = new Zend_Validate_Regex(array('pattern' => '/^[0-9]{4}$/'));
            $filter = new Zend_Filter_StripTags();
            $companycode = $filter->filter($this->_request->getPost('companyCode'));
         //public   function companyCodeValidate(){
        if(!($validator->isValid($companycode))){
$errorCompanyCode="Only four digit number is allowed";
$session->errorComCode = $errorCompanyCode;
$this->_redirect('/new');
        }else{
            $session->errorComCode="";
            $this->_redirect('/index');
        }
//}
/*
        switch("value"){
        	case $companycode:
                        companyCodeValidate();
                        break;

        }*/
    }
    }


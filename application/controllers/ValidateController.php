  <?php
  class ValidateController extends Zend_Controller_Action{
  	function validateAction(){
      $errorCodeArray=array();

         $errorCompanyCode="";
         $errorPurchasingOrg="";
         $sessionCompanyCode = new Zend_Session_Namespace('session');
        // $sessionPurchasingOrg = new Zend_Session_Namespace('session');
        
            $filter = new Zend_Filter_StripTags();
            $companycode = $filter->filter($this->_request->getPost('companyCode'));
            $purchasingorg = $filter->filter($this->_request->getPost('purchasingOrganisation'));
            //================same error code============
            $vendorname = $filter->filter($this->_request->getPost('name'));
            $contactcity = $filter->filter($this->_request->getPost('contactCity'));
            $contactcounty = $filter->filter($this->_request->getPost('contactCounty'));
            $contactothercountry = $filter->filter($this->_request->getPost('contactOtherCountry'));
            $remitcity = $filter->filter($this->_request->getPost('remitCity'));
            $remitcounty = $filter->filter($this->_request->getPost('remitCounty'));
            $remitothercountry = $filter->filter($this->_request->getPost('remitOtherCountry'));
            $othercurrency = $filter->filter($this->_request->getPost('otherCurrency'));
            $bankname = $filter->filter($this->_request->getPost('bankName'));
            $bankbranch = $filter->filter($this->_request->getPost('bankBranch'));
            $bankcity = $filter->filter($this->_request->getPost('bankCity'));
            $bankcounty = $filter->filter($this->_request->getPost('bankCounty'));
            $bankothercountry = $filter->filter($this->_request->getPost('bankOtherCountry'));
            $contactPostcode = $filter->filter($this->_request->getPost('contactPostcode'));
            $contactTelephone = $filter->filter($this->_request->getPost('contactTelephone'));
            $contactFax = $filter->filter($this->_request->getPost('contactFax'));
            $selfAssesmentTaxNo = $filter->filter($this->_request->getPost('selfAssesmentTaxNo'));
            $vatNumber = $filter->filter($this->_request->getPost('vatNumber'));
            $remitPostcode = $filter->filter($this->_request->getPost('remitPostcode'));
            $remitTelephone = $filter->filter($this->_request->getPost('remitTelephone'));
            $remitFax = $filter->filter($this->_request->getPost('remitFax'));
            $bankPostcode = $filter->filter($this->_request->getPost('bankPostcode'));
            $accountNumber = $filter->filter($this->_request->getPost('accountNumber'));
            $sortCode = $filter->filter($this->_request->getPost('sortCode'));
            array_push($errorCodeArray,$companycode,$purchasingorg,$vendorname,$contactcity,$contactcounty,$contactothercountry,
            $remitcity,$remitcounty,$remitothercountry,$othercurrency,$bankname,$bankbranch,$bankcity,$bankcounty,
            $bankothercountry,$contactPostcode,$contactTelephone,$contactFax,$selfAssesmentTaxNo,$vatNumber,$remitPostcode,
            $remitTelephone,$remitFax,$bankPostcode,$accountNumber,$sortCode);
            $rec=ValidateController::errorCodeFunc($errorCodeArray);
            $sessionCompanyCode->errorArray=$rec;
            $sessionCompanyCode->currentForm=$errorCodeArray;
for($a=0;$a<count($rec);$a++){
  if($rec[$a]==true){
    $flag=1;
    break;
  }
  else{
    $flag=0;
  }
}
if($flag==1){
  $this->_redirect('/new');
}
else{
  unset($sessionCompanyCode->currentForm);
  $this->_redirect('/index');
}
            /*
            if($rec){
              $errorCompanyCode="Only four digit number is allowed";
         $sessionCompanyCode->errorComCode = $errorCompanyCode;
         $this->_redirect('/new');
            }else
         {
           $this->_redirect('/index');
         }*/
            //print_r($errorCodeArray);
         //public   function companyCodeValidate(){
        
    }

    public static function errorCodeFunc(array $error){
      $errorCode=array();
      $validatorComCode = new Zend_Validate_Regex(array('pattern' => '/^[0-9]{4}$/'));
        $validatorPurOrg = new Zend_Validate_Regex(array('pattern' => '/^[a-zA-Z0-9]{3,6}$/'));
        $validatorText= new Zend_Validate_Regex(array('pattern' => '/^[a-zA-Z ]*$/'));
        $validatorNum=new Zend_Validate_Regex(array('pattern'=>'/^[0-9]*$/'));
        if(!($validatorComCode->isValid($error[0]))){
        //$errorCompanyCode="Only four digit number is allowed";
        //$sessionCompanyCode->errorComCode = $errorCompanyCode;
          array_push($errorCode, true);
        //$this->_redirect('/new');
                }else
                {
                array_push($errorCode, false);
          //$this->_redirect('/index');
        }
                 if(!($validatorPurOrg->isValid($error[1]))){
        array_push($errorCode, true);
                }
                else{
                   array_push($errorCode, false);
                }
                for($a=2;$a<=14;$a++){
                  if(!($validatorText->isValid($error[$a]))){
        array_push($errorCode, true);
                }
                else{
                   array_push($errorCode, false);
                }
                }
                for ($i=15; $i<count($error) ; $i++) { 
                    if(!($validatorNum->isValid($error[$i]))){
        array_push($errorCode, true);
                }
                else{
                   array_push($errorCode, false);
                }
                }
                return $errorCode;
            }
  }


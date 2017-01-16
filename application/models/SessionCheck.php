<?php
class SessionCheck{
	//static function to check the user existance
	public static function sessionCheckSum(){	
	$flag=0;	
	     $vendorsession= new VendorSession();//object of VendorSession
         $sessionuser=$vendorsession->getSessionUser();//User id of user
         if(is_null($sessionuser)){
			return $flag;
         }
         if(isset($sessionuser)){
         	return $sessionuser;
         }
         else{
         	return $flag;
         }
	}
}
?>
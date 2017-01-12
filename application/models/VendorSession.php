  <?php
  class VendorSession {
  	public static function setUser(User $user){
        $userNamespace = new Zend_Session_Namespace('user');
       $userNamespace->instance=$user ;
        //$mysession= $userNamespace->instance;
    }
public function getSessionUser(){
  
        $userNamespace = new Zend_Session_Namespace('user');
        $userNamespace->lock();
        $sessionobj=$userNamespace->instance;
        if(is_null($sessionobj)){
          return null;
        }
        $sessionuser=$sessionobj->getUsername();
        return $sessionuser;
}
}
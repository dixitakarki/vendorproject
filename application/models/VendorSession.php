  <?php
  class VendorSession {
  	public static function setUser(User $user){
        $userNamespace = new Zend_Session_Namespace('user');
       $userNamespace->instance=$user ;
        //$mysession= $userNamespace->instance;
    }
    public static function getUser(){
        try{
        if (false === Zend_Session::namespaceIsset('user')) {
            
        	throw new Exception('User has not been defined');
        }

        $userNamespace = new Zend_Session_Namespace('user');
        $userNamespace->lock();
        $sessionobj=$userNamespace->instance;
        $sessionuser=$sessionobj->getUsername();
        return $sessionuser;
       // $output = $userNamespace->instance;
       // print_r($output->getUsername());
      // $mysession2=$mysession;
        /*
        if ($mysession instanceof User){
            
        	return $output;
        }*/

    }catch(Exception $e){
    }    
}
public function getSessionUser(){
  
        $userNamespace = new Zend_Session_Namespace('user');
        $userNamespace->lock();
        $sessionobj=$userNamespace->instance;
        $sessionuser=$sessionobj->getUsername();
        return $sessionuser;
}
}
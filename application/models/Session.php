  <?php
  class Session{
  	public static function setUser(User $user){
        $userNamespace = new Zend_Session_Namespace('user');
       $userNamespace->instance=$user ;
       $hey= $userNamespace->instance;
       $hello=$hey->getUsername();
       $mysession=$hello;
        print_r("hello34323");
        print_r($mysession);
        //$mysession= $userNamespace->instance;
    }
    public static function getUser(){
        try{
        if (false === Zend_Session::namespaceIsset('user')) {
            
        	throw new Exception('User has not been defined');
        }

        $userNamespace = new Zend_Session_Namespace('user');
       // $userNamespace->lock();
   
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
}
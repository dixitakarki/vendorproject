  <?php
class User extends Zend_Db_Table
{
	 protected $_name    = 'users';
	private $_username="guest";			//string
    private $_firstName;		//string
    private $_surname;			//string
    private $_role;				//Role
    private $_email;			//string
    private $_password;
     public function __construct($username='guest'){
        $this->_username=$username;
       //print_r($this->_username);
    }
    
 
	public static function getInstanceFromUser(Zend_Auth_Result $result){
        print_r("hello usergetinstance  ");
        $username = $result->getIdentity();
        $user = new User($username);
       // print_r($user->_username);
        return $user;

    }
    public function setFirstName($firstName){
    	
    	$this->_firstName = $firstName;
    }
    public function getFirstName(){	
        return $this->_firstName;
    }
    public function setSurname($surname){  	  	
         $this->_surname =$surname ;
    }
     public function getSurname(){  	  	
        return $this->_surname;
    }
    public function setRole($role){  	  	
         $this->_role =$role ;
    }
     public function getRole(){  	  	
        return $this->_role;
    }
     public function setEmail($email){  	  	
         $this->_email =$email ;
    }
     public function getEmail(){  	  	
        return $this->_email;
    }
    public function setPassword($password){  	  	
         $this->_password =$password ;
    }
     public function getPassword(){  	  	
        return  $this->_password;
    }
    public function setUsername($username){
    	
    	$this->_username = $username;
    }
    public function getUsername(){	
        return $this->_username;
    }

}
   ?>
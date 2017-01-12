<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
/*
protected function _initDbAdapter() {//can be named anything as long as it starts with _init
        // $db = new Zend_Config($this->getOptions('db'));//get all db adapter resources
        // Zend_Registry::set('DbAdapter', $db); //save to Zend_registry key DbAdapter
        $config = new Zend_Config_Ini('../application/configs/application.ini', 'production');
Zend_Registry::set('config', $config);
// setup database
$db = Zend_Db::factory($config->db->adapter, 
        $config->db->config->toArray());
Zend_Db_Table::setDefaultAdapter($db);
Zend_Registry::set('db', $db);
    }
*/

    public function __initSession(){
    	try{
    	Zend_Session::start();
    	$usersession = new Zend_Session_Namespace('user');
    	Zend_Session::setOptions(array('name'=>'vendorproject'));
    }catch(Exception $e){
    	$this->view->error=$e->getMessage();
    }
    }
    protected function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array('namespace' => '', 'basePath' => APPLICATION_PATH));
        return $autoloader;
    }
}


<?php
class Input extends Zend_Db_Table
{
	public function getOptions(){
	$options = new Zend_Config_Ini(APPLICATION_PATH.'/configs/options.ini', APPLICATION_ENV);
	    
	    return $options;
	}
}
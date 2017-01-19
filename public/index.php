<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

require_once realpath(APPLICATION_PATH . '/../vendor/autoload.php');
/** Zend_Application */
require_once 'Zend/Application.php';
require_once 'Zend/Loader/Autoloader.php';
Zend_Loader_Autoloader::getInstance();
spl_autoload_register('applicationAutoload');
// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

$config = new Zend_Config(
    array(
        'database' => array(
            'adapter' => 'PDO_MYSQL',
            'params'  => array(
                'host'     => 'localhost',
                'dbname'   => 'vendors_stage',
                'username' => 'root',
                'password' => '',
            )
        )
    )
);
$db = Zend_Db::factory($config->database);
Zend_Db_Table::setDefaultAdapter($db);
Zend_Registry::set('db', $db);	
$application->bootstrap()
            ->run();

            function applicationAutoload($className){
    /**
     * @var array $classDirectoryTree
     */
    $classDirectoryTree = explode('_', $className);

    /**
     * @var string $classDirecoryRoot
     */
    $classDirectoryRoot = current($classDirectoryTree);

    switch($classDirectoryRoot) {

        case 'Zend' :
            require_once(implode('/', $classDirectoryTree) . '.php');
            return;

        default:

            /**
             * @var string $requirePath
             */
            $requirePath =
            APPLICATION_PATH . '/models/' . implode('/', $classDirectoryTree) . '.php';
    }

    if (file_exists($requirePath)) {

        require_once($requirePath);
    }
}
<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
    
    
    protected function _initActiveRecord()
    {
        require_once("../library/AR/ActiveRecord/ActiveRecord.php");
        ActiveRecord\Config::initialize(function($cfg)
        {
            $cfg->set_model_directory(APPLICATION_PATH . '/models' );
            $cfg->set_connections(array(
                'development' => 'mysql://root:root@localhost/ar'));
        });
    }
    protected function _initAutoload()
    {
        // Add autoloader empty namespace
        $autoLoader = Zend_Loader_Autoloader::getInstance();
        $resourceLoader = new Zend_Loader_Autoloader_Resource(array(
                    'basePath'
                    => APPLICATION_PATH,
                    'namespace' => '',
                    'resourceTypes' => array(
                        'form' => array('path' => 'forms/',
                                        'namespace' => 'Form_',
                        )),
                ));
        return $autoLoader;
    }
    

}


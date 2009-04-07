<?php

function bootstrap() {
  initClassLoader();
  
  $register = Zend_Registry::getInstance();
  
  // profiler stopwatch object
  $register->set('watch', new Yaz_StopWatch());
  
  // load config file
  $config = new Zend_Config_Ini(ROOTDIR.'/conf/config.ini', RUNENV);
  $register->set('config', $config);
  
  initSession($config);
}

function initClassLoader() {
  set_include_path(
  	get_include_path().PATH_SEPARATOR.
  	ROOTDIR.'/library'
  );
  require_once 'Zend/Loader.php';
  Zend_Loader::registerAutoload();
}

function initSession($config) {
  Zend_Session::setOptions($config->session->toArray());
  
  if ( isset($_POST['remember_me']) ) {
    // this is a login request
    if ( $_POST['remember_me'] == 'yes' ) {
      Zend_Session::rememberMe($config->session->remember_me_period);
      setcookie('remember_me', 'yes', 
                time()+$config->session->remember_me_period,
                '/', $config->session->domain);
    } else {
      Zend_Session::forgetMe();
      setcookie('remember_me', 'yes', time()-3600, '/', 
                $config->session->domain);
    }
  }
  
  Zend_Session::start();
}

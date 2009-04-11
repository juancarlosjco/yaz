<?php

class IndexController extends Zend_Controller_Action {
  
  public function init() {
    /* Initialize action controller here */
    
  }
  
  
  public function indexAction() {
  	require_once 'Table/Users.php';
    $table = new Table_Users();
    $rows = $table->find("1");
    var_dump($rows);
  }
  
}






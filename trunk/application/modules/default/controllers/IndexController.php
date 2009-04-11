<?php

class IndexController extends Zend_Controller_Action {
  
  public function init() {
    /* Initialize action controller here */
    
  }
  
  
  public function indexAction() {
  	require_once 'Table/Users.php';
    $table = new Table_Users();
    $row = $table->find('1')->current();
    $this->view->name = $row->name;
  }
  
}






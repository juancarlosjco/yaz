<?php

class Bootstrap extends Zend_Application_Bootstrap_Base {
  
  public function run() {
    $this->frontController->dispatch();
  }
}



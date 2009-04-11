<?php

class Bootstrap extends Zend_Application_Bootstrap_Base {
  
  public function run() {
    $this->bootstrap('frontcontroller');
    $this->frontController->dispatch();
  }
}



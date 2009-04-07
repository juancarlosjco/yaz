<?php
class Yaz_StopWatch {
  private $_start;

  function __construct() {
    $this->_start = $this->_utime();
  }

  public function elapse() {
    return $this->_utime()-$this->_start;
  }

  private function _utime() {
    $time = explode( " ", microtime());
    $usec = (double)$time[0];
    $sec = (double)$time[1];
    return $sec + $usec;
  }
}

<?php

class Yaz_Db_Table_Abstract extends Zend_Db_Table_Abstract {
  const PREFIX = 'Table_';
  const PREFIX_LEN = 6;
  
  protected function _setupTableName() {
    if ( empty($this->_name) ) {
    	$className = get_class($this);
      if ( strncmp(self::PREFIX, $className, self::PREFIX_LEN) == 0 ) {
        $this->_name = strtolower(substr($className, self::PREFIX_LEN));
      } else {
        $this->_name = strtolower($className);
      }
    }
    parent::_setupTableName();
  }
  
  protected function _setupPrimaryKey() {
    if ( empty($this->_primary) ) {
      $this->_primary = 'id';
    }
    parent::_setupPrimaryKey();
  }
}
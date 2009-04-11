<?php

class Yaz_Application_Resource_Layout extends Zend_Application_Resource_Base {
  
  function init() {
  	$bootstrap = $this->getBootstrap();
    $bootstrap->bootstrap('view');
    $options = $this->getOptions();
    $this->_initPlaceHolders($options);
    Zend_Layout::startMvc($options['params']);
  }
  
  function _initPlaceHolders( /*RO*/ & $options) {
  	if ( ! empty($options['docType']) ) {
  	  $helper = new Zend_View_Helper_Doctype();
  	  $helper->doctype($options['docType']);
  	}
  	
  	if ( ! empty($options['css'] ) ) {
  	  $helper = new Zend_View_Helper_HeadLink();
  	  if ( is_array($options['css']) ) {
  	    foreach($options['css'] as $css)
  	  	$helper->appendStylesheet($css);
  	  } else {
  	    $helper->appendStylesheet($options['css']);
  	  }
  	  
  	}
  	
  	if ( ! empty($options['headMeta']) ) {
  	  $meta = $options['headMeta'];
  	  $helper = new Zend_View_Helper_HeadMeta();
  	  if ( ! empty($meta['http-equiv']) ) {
  	  	$equiv = $meta['http-equiv'];
  	  	foreach ($equiv as $key=>$value) {
  	  	  $helper->appendHttpEquiv($key, $value);
  	  	}
  	  }
  	}
  }
}

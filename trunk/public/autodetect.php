<?php

// Runtime environment auto detection.

function detectBaseURL() {
  $docRoot = realpath($_SERVER['DOCUMENT_ROOT']);
  $cur = realpath(dirname(__FILE__));
  
  $rootLen = strlen($docRoot);
  if ( strncmp($docRoot, $cur, $rootLen) == 0 ) {
    define('BASEURL', substr($cur, $rootLen));
  } else {
    throw Exception('Can not detect base URL. root: '
    								.$docRoot.' current: '.$cur);
  }
}

function detectRootDir($relativeRootFolder='..') {
  define('ROOTDIR', realpath($relativeRootFolder));
}

function detectRunEnv() {
	$host = explode(':', $_SERVER['HTTP_HOST']);
	if ( $host[0] == 'localhost' || $host[0]=='127.0.0.1' 
				|| preg_match('/\\.local$/', $host[0]) ) {
	  if ( stristr(PHP_OS, 'WIN') ) {
	    define('RUNENV', 'winlocal');
	  } else {
	  	define('RUNENV', 'local');
	  }
	} else if ( preg_match('/\\.test$/', $host[0]) ) {
	  define('RUNENV', 'test');
	} else {
	  define('RUNENV', 'prod');
	}
}

function allowOnly($ipPrefix='') {
  return strncmp($_SERVER['REMOTE_ADDR'], $ipPrefix, strlen($ipPrefix))==0;
}
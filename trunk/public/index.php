<?php
// This is entry point for product environment
// For product environment, We tend to give hard code settings 
define('BASEURL', '');
define('ROOTDIR', '/home/html/yaz');
define('RUNENV', 'prod');

// or you make use our auto detecting if you are really too lazy to find out
// above parameters, assume you know root dir is '..', this is most case;

/*
require 'autodetect.php';
detectBaseURL();
detectRootDir('..')
detectRunEnv();
 */

// call MVC bootstrap
require ROOTDIR.'/application/bootstrap.php';
bootstrap();
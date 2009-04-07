<?php

// entry point for QC tester environment
// We use auto detect here. However, you can use predifine setting if you like

/*
define('BASEURL', '');
define('ROOTDIR', '/home/html/yaz');
define('RUNENV', 'local'); // maybe winlocal
 */

require 'autodetect.php';
// in case we point to this server by accident in production server,
// we limit access from local network only
allowOnly('192.168.');

detectBaseURL();
detectRootDir('..');
detectRunEnv();

// call MVC bootstrap
require ROOTDIR.'/application/bootstrap.php';
bootstrap();
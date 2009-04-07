<?php

// entry point for local development environment
// We use auto detect here for most fit into every developer's
// setting. So we don't have to have entry point for each developer.

/*
define('BASEURL', '');
define('ROOTDIR', '/home/html/yaz');
define('RUNENV', 'local'); // maybe winlocal
 */

require 'autodetect.php';
// in case we point to this server by accident in production server,
// we limit access from localhost only
allowOnly('127.0.0.1');

detectBaseURL();
detectRootDir('..');
detectRunEnv();
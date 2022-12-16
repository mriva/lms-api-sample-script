<?php

use App\LmsApi;

require 'vendor/autoload.php';
require 'config.php';

if (empty($argv[1])) {
    die('Please specify user idst');
}

define('APP_ROOT', dirname(__DIR__));

$api = new LmsApi;

$response = $api->suspendUser($argv[1]);

print_r($response);

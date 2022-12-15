<?php

use App\LmsApi;

require 'vendor/autoload.php';
require 'config.php';

if (!TEST_USER_NAME || !TEST_USER_PASSWORD) {
    die('Please set TEST_USER_NAME and TEST_USER_PASSWORD in config.php');
}

define('APP_ROOT', dirname(__DIR__));

$api = new LmsApi;

$response = $api->createUser([
    'userid' => TEST_USER_NAME,
    'firstname' => 'Nome',
    'lastname' => 'Cognome',
    'password' => TEST_USER_PASSWORD,
    'email' => "email@example.com",
    'valid' => 1,
    'force_change' => 1,
    'role' => 'user',
]);

print_r($response);

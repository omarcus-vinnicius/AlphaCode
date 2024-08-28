<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-Width, Content-Type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT, PATCH');

require_once 'vendor/autoload.php';
require_once 'env.php';
require_once './src/settings.php';
require_once './App/Routes/contact.php';
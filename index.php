<?php
require  'vendor/autoload.php';
require_once 'src/Configurations/database.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require 'src/Routes/web.php';


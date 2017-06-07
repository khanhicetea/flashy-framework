<?php
require_once dirname(__FILE__).'/helpers.php';

$autoloader = (require_once dirname(__DIR__).'/vendor/autoload.php');

$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

$application = (require_once dirname(__FILE__).'/application.php');
return $application;

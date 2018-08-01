<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

define('API_HOST', getenv('APP_URL'));
define('API_TOKEN', 'cOyZo00AXop4Ldl9pg5Yg57i5pKO8DbYvosAwk7iidvAojIX2bgya8eqUq1a');

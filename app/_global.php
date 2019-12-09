<?php
    
// Require Dotenv to read .env file of Laravel
require __DIR__ . '/phpdotenv/Dotenv.php';
require __DIR__ . '/phpdotenv/Loader.php';
require __DIR__ . '/phpdotenv/Validator.php';

$dotenv = new Dotenv\Dotenv(__DIR__);

$dotenv->load();

$dotenv->required(array(
    'LCG_API_ACCESS_TOKEN',
    'LCG_API_ACCESS_USER',
    'LCG_API_URL_BASE'
));
       
?>
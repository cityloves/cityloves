<?php
use Dotenv\Dotenv;

$dotenv = Dotenv::create(__DIR__, '.env');
$dotenv->load();

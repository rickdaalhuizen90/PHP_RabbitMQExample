<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Consumer;
use App\Producer;

define('AMQP_DEBUG', true);

header('Content-Type: text/plain; charset=utf-8');

$producer = new Producer();
$producer->send('Hello World!');

$consumer = new Consumer();
$consumer->receive();

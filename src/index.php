<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Consumer;
use App\Producer;

define('AMQP_DEBUG', true);

$producer = new Producer();
$producer->send('Hello World!');

$consumer = new Consumer();
$consumer->receive();

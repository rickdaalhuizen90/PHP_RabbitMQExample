<?php

declare(strict_types=1);

namespace App;

use PhpAmqpLib\Message\AMQPMessage;

// Send messages to the queue
readonly class Producer
{
    private RabbitMQManager $instance;

    public function __construct()
    {
        $this->instance = RabbitMQManager::getInstance();
    }

    public function send(string $message = 'Hello World!'): void
    {
        $msg = new AMQPMessage($message);
        $this->instance->getChannel()->basic_publish($msg, '', 'hello');
        echo " [x] Sent '$message'" . PHP_EOL;
    }
}
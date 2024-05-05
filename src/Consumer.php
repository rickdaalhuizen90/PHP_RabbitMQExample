<?php

declare(strict_types=1);

namespace App;

use PhpAmqpLib\Message\AMQPMessage;

// Receive messages from the queue
readonly class Consumer
{
    private RabbitMQManager $instance;

    public function __construct()
    {
        $this->instance = RabbitMQManager::getInstance();
    }

    public function receive(): void
    {
        echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";

        $this->instance->getChannel()->basic_consume(queue: 'hello', callback: function (AMQPMessage $msg) {
            echo ' [x] Received ', $msg->body, "\n";
        });

        while ($this->instance->getChannel()->is_consuming()) {
            $this->instance->getChannel()->wait();
        }
    }
}
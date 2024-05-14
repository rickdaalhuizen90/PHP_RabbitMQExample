<?php

declare(strict_types=1);

namespace App;

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMQManager
{
    private static ?RabbitMQManager $instance = null;
    private AMQPStreamConnection $connection;
    private AMQPChannel $channel;

    private function __construct()
    {
        $this->connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest'); // use .env or server variable
        $this->channel = $this->connection->channel();
        $this->channel->queue_declare('hello'); // use .env
    }

    public static function getInstance(): RabbitMQManager
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getChannel(): AMQPChannel
    {
        return $this->channel;
    }

    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }
}
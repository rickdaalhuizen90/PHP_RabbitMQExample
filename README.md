# RabbitMQ PHP Example

A simple example of using RabbitMQ with PHP to send and receive messages.

## Getting Started

1. Build the PHP Docker image:
   ```
   make build
   ```
2. Start the server:
   ```
   make start
   ```
3. Stop the server:
   ```
   make stop
   ```
4. Test connection
   [http://127.0.0.1:8000/](http://127.0.0.1:8000/)
## How it Works

The application uses a **Producer** to send messages and a **Consumer** to receive them. The communication happens through RabbitMQ, without direct communication between the two.

1. The **Producer** publishes messages to an **Exchange**.
2. The **Exchange** routes the messages to the appropriate **Queue** based on the message's **Routing Key**.
3. The **Consumer** retrieves messages from the **Queue** and processes them.

## Key Concepts

- **Exchange:** Routes messages from the producer to the correct queue.
- **Queue**: Holds messages until the consumer picks them up.
- **Routing Key**: Determines which **Queue** the message will be sent to.

## TODO

- [x] Fix the `Uncaught PhpAmqpLib\Exception\AMQPIOException: stream_socket_client()` error that occurs when the PHP application tries to connect to the RabbitMQ server. This may be due to network configuration issues or the RabbitMQ server not being accessible from the PHP application's container.
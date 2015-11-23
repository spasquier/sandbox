<?php
// Include AMQP library
require __DIR__ . "/../../vendor/autoload.php";
use PhpAmqpLib\Connection\AMQPStreamConnection;

// Obtain queue using AMQP
$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

// Declare callback for a queue (Consume)
$channel->queue_declare('hello_world', false, false, false, false);
echo " [*] Waiting for messages. To exit press CTRL+C" . "\n";
$callback = function($msg) {
    echo " [x] Received '" . $msg->body . "'\n";
};
$channel->basic_consume('hello_world', '', false, true, false, false, $callback);

// Wait for messages
while (count($channel->callbacks)) {
    $channel->wait();
}

<?php
// Include PhpAmqpLib from composer
require __DIR__ . "/../../vendor/autoload.php";
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

// Creating the abstract socket connection and the AMQP protocol channel
$connection = new AMQPStreamConnection("localhost", 5672, 'guest', 'guest');
$channel = $connection->channel();

// Create queue and publish a message (Producing)
$string = 'The universe!';
$channel->queue_declare('hello_world', false, false, false, false);
$msg = new AMQPMessage($string);
$channel->basic_publish($msg, '', 'hello_world');
echo " [x] Sent '$string'\n";

// Close things
$channel->close();
$connection->close();

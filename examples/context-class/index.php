<?php

require __DIR__ . "/vendor/autoload.php";

use App\InjectedMessage;
use App\SimpleMessage;
use Dumbo\Dumbo;

$app = new Dumbo();

// Context middleware for all routes
$app->use(function ($context, $next) {
    $context->set(SimpleMessage::class, "Hello", "Dumbo!");
    $context->set(
        InjectedMessage::class,
        new SimpleMessage('Hello', 'Dumbo!')
    );

    return $next($context);
});

$app->get("/", function ($context) {
    $messageClass = $context->get(SimpleMessage::class);
    $message = $messageClass->getMessage();

    return $context->json([
        "message" => $message,
    ]);
});

$app->get("/injection", function ($context) {
    $injectedClass = $context->get(InjectedMessage::class);
    $message = $injectedClass->getInjectedMessage();

    return $context->json([
        "message" => $message,
    ]);
});

$app->run();

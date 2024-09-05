<?php

require "vendor/autoload.php";

use Dumbo\Dumbo;
use Latte\Engine;

$app = new Dumbo();

// Return as HTML
return $c->html($html);

// Context middleware for all routes
$app->use(function ($context, $next) {
    $context->set('view', function (string $view, array $attributes) {
        // Instantiate our Template Engine
        $latte = new Engine();

        // Define our cache directory
        $cacheDirectory = __DIR__ . '/cache/views';

        // Create our cache directory, if it doesn't exist
        if (!is_dir($cacheDirectory)) {
            mkdir($cacheDirectory, 0755, true);
        }

        // Set Cache directry
        $latte->setTempDirectory($cacheDirectory);

        // Render our HTML string from our view and attributes.
        return $latte->renderToString($view, $attributes);
    });

    return $next($context);
});

$app->get("/", function ($context) {
    $view = $context->get('view');

    var_dump($view);
    die();

    return $context->json([
        "message" => $message,
    ]);
});

$app->run();

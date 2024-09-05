<?php

require "vendor/autoload.php";

use Dumbo\Dumbo;
use Latte\Engine;
use Dumbo\Context;
use Dumbo\Helpers\View;

$app = new Dumbo();

// $app->use(
View::driver(
    function (string $view, array $attributes) {
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
        $html = $latte->renderToString($view, $attributes);

        return $html;
    }
);
// );

$app->get("/", function ($context) {
    $view = $context->view('home.latte', [
        'message' => 'Dumbo'
    ]);

    return $view;

    // dump($view);
    // die();

    // return $context->json([
    //     "message" => $message,
    // ]);
});

$app->run();

<?php
// web/index.php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../options.inc.php';

$app = new Silex\Application();

// who loves bugs? you know i do
$app['debug'] = $env['debug'];

$app->get('/hello/{name}', function($name) use ($app) {
    return 'Hello there '. $app->escape($name);
});

$app->run();

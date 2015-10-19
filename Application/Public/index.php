<?php

require_once
    dirname(__DIR__) . DIRECTORY_SEPARATOR .
    'Bootstrap.php';

use Hoa\Core;
use Hoa\Dispatcher;
use Hoa\Router;

Core::enableErrorHandler();
Core::enableExceptionHandler();

$dispatcher = new Dispatcher\ClassMethod([
    'synchronous.call'  => 'Application\Resource\(:call:U:)',
    'synchronous.able'  => '(:%variables._method:U:)',
    'asynchronous.call' => '(:%synchronous.call:)',
    'asynchronous.able' => '(:%synchronous.able:)'
]);
$router = new Router\Http();

$router
    // Private rules.
    ->_get(
        '_resource',
        '/Static/(?<resource>)'
    )

    // Public rules.
    ->get(
        'dates',
        '/api/dates',
        'Dates'
    )
    ->get(
        'fallback',
        '/.*',
        'Fallback'
    );


$dispatcher->dispatch($router);

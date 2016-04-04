<?php

require_once
    dirname(__DIR__) . DIRECTORY_SEPARATOR .
    'Bootstrap.php';

use Hoa\Exception;
use Hoa\Dispatcher;
use Hoa\Router;

Exception\Error::enableErrorHandler();
Exception\Idle::enableUncaughtHandler();

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
        'discography',
        '/api/discography',
        'Discography'
    )
    ->get(
        'album',
        '/api/album/(?<albumId>.+)',
        'Album'
    )
    ->get(
        'videos',
        '/api/videos',
        'Videos'
    )
    ->get(
        'fallback',
        '/.*',
        'Fallback'
    );


$dispatcher->dispatch($router);

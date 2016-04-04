<?php

require_once
    __DIR__ . DIRECTORY_SEPARATOR .
    'vendor' . DIRECTORY_SEPARATOR .
    'autoload.php';

Hoa\Protocol::getInstance()['Application']->setReach(__DIR__ . DS);

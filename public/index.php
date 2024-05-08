<?php

use Lib\Exception\Handler\ExceptionHandler;
use Lib\Http\Request;

require_once __DIR__ . '/../vendor/autoload.php';

define('__BASE_DIR__', __DIR__ . '/..');

set_exception_handler(ExceptionHandler::class. '::handle');

$request = Request::create();

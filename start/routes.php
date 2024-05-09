<?php

use App\Controller\PlaceBetController;
use Lib\Http\HttpMethod;

return [
    '/bet' => [PlaceBetController::class, HttpMethod::POST],
];

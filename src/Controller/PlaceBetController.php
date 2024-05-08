<?php

declare(strict_types=1);

namespace App\Controller;

use Lib\Controller\AbstractController;
use Lib\Http\Request;

final class PlaceBetController extends AbstractController
{
    public function __invoke(Request $request): void
    {
        echo "PlaceBetController: {$request->getUri()}";
    }
}

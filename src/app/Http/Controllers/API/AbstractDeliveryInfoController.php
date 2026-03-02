<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\APICRUDService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

abstract class AbstractDeliveryInfoController extends Controller
{
    public function __construct(
        protected APICRUDService $apiCrudService,
    ) {}

    public function index(): JsonResponse
    {
        $data = $this->getData();

        return $this->apiCrudService->handleAction(fn() => response()->json([
            'data' => $data,
            'failed' => false
        ]));
    }

    public function getData(): Collection
    {
        return collect();
    }
}

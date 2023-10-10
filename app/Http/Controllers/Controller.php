<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function ok($resource = null): JsonResponse
    {
        return $this->respondResourceWithStatusCode($resource, Response::HTTP_OK);
    }
    public function created($resource = null): JsonResponse
    {
        return $this->respondResourceWithStatusCode($resource, Response::HTTP_CREATED);
    }
    protected function respondResourceWithStatusCode($resource, $statusCode): JsonResponse
    {
        if (is_array($resource)) {
            $resource = new JsonResource($resource);
        }
        return ($resource ?? new JsonResource([]))->response()->setStatusCode($statusCode);
    }
}

<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class Json
{
    const ERROR = 'error';
    const SUCCESS = 'success';

    public function success(array $data, int $code = 200): JsonResponse
    {
        return $this->formulateResponse(self::SUCCESS, $data, $code);
    }

    public function error(array $data, int $code = 400): JsonResponse
    {
        return $this->formulateResponse(self::ERROR, $data, $code);
    }

    private function formulateResponse(string $status, array $data, int $httpStatus): JsonResponse
    {
        return Response::json([
            'status' => $status,
            'data' => $data,
        ], $httpStatus);
    }
}

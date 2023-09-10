<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Validation\ValidationException;
use Json;
use Login;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        try {

            $response = Login::store($request->validated());

            if (isset($response['error'])) {
                return Json::error($response['error'], $response['code']);
            }

            return Json::respondWithToken($response['success']);
        } catch (ValidationException $e) {

            return Json::error(['message' => $e->validator->errors()], 422);
        }
    }
}

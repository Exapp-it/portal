<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Json;
use Login;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        if ($request->hasFailed()) {
            $errors = $request->getErrors()->messages();
            return Json::error($errors);
        };

        $response = Login::store($request->validated());

        if (isset($response['error'])) {
            return Json::error($response['error'], $response['code']);
        }

        return Json::success($response['success']);
    }
}

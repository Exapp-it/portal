<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Notifications\RegistrationSuccessful;
use Illuminate\Validation\ValidationException;
use Json;
use Register;

class RegisterController extends Controller
{
    function __invoke(RegisterRequest $request)
    {
        try {

            $user = Register::store($request->validated());
            $user->notify(new RegistrationSuccessful());

            return Json::success([
                'message' => 'Registration was successful',
                'user' => new UserResource($user),
            ]);
        } catch (ValidationException $e) {

            return Json::error(['message' => $e->validator->errors()], 422);
        }
    }
}

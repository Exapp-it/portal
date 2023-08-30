<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Notifications\RegistrationSuccessful;
use Json;
use Register;

class RegisterController extends Controller
{
    function __invoke(RegisterRequest $request)
    {
        if ($request->hasFailed()) {
            $errors = $request->getErrors()->messages();
            return Json::error($errors);
        }

        $user = Register::store($request->validated());
        $user->notify(new RegistrationSuccessful());


        return Json::success([
            'message' => 'Registration was successful',
            'user' => new UserResource($user),
        ]);
    }
}

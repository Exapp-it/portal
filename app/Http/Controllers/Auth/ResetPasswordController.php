<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Json;

class ResetPasswordController extends Controller
{

    public function reset(Request $request)
    {
        try {
            $data = $request->validate([
                'token' => ['required'],
                'email' => ['required', 'email'],
                'password' => ['required', 'confirmed', 'min:6'],
            ]);

            $user = User::where('email', $data['email'])->first();

            if (!$user) {
                return Json::error(['message' => 'User not found for this email address.'], 400);
            }

            $response = Password::broker()->reset(
                $data,
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->save();
                }
            );

            return $response == Password::PASSWORD_RESET
                ? Json::success(['message' => 'Password has been reset.'], 200)
                : Json::error(['message' => 'Failed to reset password.'], 400);
        } catch (ValidationException $e) {
            return Json::error(['message' => $e->validator->errors()], 422);
        }
    }
}

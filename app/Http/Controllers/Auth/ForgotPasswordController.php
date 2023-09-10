<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Json;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        try {

            $request->validate(['email' => 'required|email']);

            $response = Password::broker()->sendResetLink(
                $request->only('email')
            );

            return $response == Password::RESET_LINK_SENT
                ? response()->json(['message' => 'Reset link sent.'], 200)
                : response()->json(['error' => 'Failed to send reset link.'], 400);
        } catch (ValidationException $e) {

            return Json::error(['message' => $e->validator->errors()], 422);
        }
    }
}

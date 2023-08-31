<?php

namespace App\Services\Auth;

use App\Models\User;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Json;

class RegisterService
{
    public function store(array $data)
    {
        $data['external_id'] = $this->generateExternalId();
        $data['password'] = Hash::make($data['password']);
        $data['token'] = $this->generateToken();

        try {
            return User::create($data);
        } catch (QueryException $e) {
            Json::error(['message' => $e->getMessage()]);
        }
    }


    private function generateToken(): string
    {
        $uuid = Str::uuid()->toString();
        $currentTime = now()->timestamp;
        $salt = config('settings.token_salt');
        $token = hash('sha256', $uuid . $currentTime . $salt);

        return $token;
    }


    private function generateExternalId(int $attempts = 5)
    {
        for ($i = 0; $i < $attempts; $i++) {
            $idLength = mt_rand(9, 11);
            $id = (string) mt_rand(pow(10, $idLength - 1), pow(10, $idLength) - 1);

            if (!User::where('external_id', $id)->exists()) {
                return $id;
            }
        }
        return $this->generateExternalId();
    }
}

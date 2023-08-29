<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'external_id' => $this->external_id,
            'name' => $this->name,
            'email' => $this->email,
            'balance' => number_format($this->balance, '2', '.'),
            'currency' => $this->currency,
            'google_id' => $this->google_id ?? false,
            'avatar' => $this->avatar ?? false,
            'role' => $this->role,
            'status' => $this->status,
        ];
    }
}

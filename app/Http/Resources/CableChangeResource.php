<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CableChangeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'user_name' => $this->user->name,
            'cable_id' => $this->cable_id,
            'old_name' => $this->old_name,
            'new_name' => $this->new_name,
            'old_remain_stock' => $this->old_remain_stock,
            'new_remain_stock' => $this->new_remain_stock,
            'new_purpose' => $this->new_purpose,
            'old_purpose' => $this->old_purpose,
            'old_expected_delivery' => $this->old_expected_delivery,
            'new_expected_delivery' => $this->new_expected_delivery,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

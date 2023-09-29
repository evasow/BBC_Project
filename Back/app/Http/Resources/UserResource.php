<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
            'nomComplet' => $this->nomComplet,
            'login' => $this->login,
            'succursale'=>$this->succursale->nom,
            'succursale_id'=>$this->succursale->id,

        ];
    }
}

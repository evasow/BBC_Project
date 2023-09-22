<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccursaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        return [
            'nom' => $this->nom,
            'tel' => $this->tel,
            'adresse'=>$this->adresse,
            'quantite_stock'=>$this->pivot->quantite_stock,
            'prix_unitaire'=>$this->pivot->prix_unitaire,
            'prix_gros'=>$this->pivot->prix_gros,
        ];
    }
}

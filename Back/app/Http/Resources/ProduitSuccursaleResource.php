<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProduitSuccursaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            "id"=>$this->pivot->id,
            "nom"=>$this->nom,
            "quantite_stock"=>$this->pivot->quantite_stock,
            "prix_unitaire"=>$this->pivot->prix_unitaire,
            "prix_gros"=>$this->pivot->prix_gros,
        ];
    }
}

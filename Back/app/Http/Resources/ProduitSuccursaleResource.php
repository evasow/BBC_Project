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
            "quantite_stock"=>$this->quantite_stock,
            "prix_unitaire"=>$this->prix_unitaire,
            "prix_gros"=>$this->prix_gros,
            "libelle"=>$this->succursale->nom
        ];
    }
}

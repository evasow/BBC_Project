<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CaracteristiqueProduitCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function __construct($resource)
    {
        $this->resource = $resource;
    }
    public function toArray(Request $request): array
    {
       return $this->produitFormat($this->resource);
    }
    private function produitFormat($produit){
        return $produit->map(function($produit){
            return [
                "id"=>$produit->id,
                "libelle"=> $produit->caracteristiques->libelle,
                "valeur"=>$produit->valeur,
                "unite"=>$produit->unite->libelle,
            ];
        });
    }

}

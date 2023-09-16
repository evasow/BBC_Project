<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\JsonResource;

class ProduitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public $message;
    public function __construct($message, $resource) {
        $this->resource = $resource;
        $this->message = $message;
    }

    public function toArray(Request $request): array
    {
        return [
            'message' => $this->message,
            'data' => [$this->produitFormat($this->resource)],
            'statut'=>Response::HTTP_OK
        ];
    }
    public function produitFormat($resource){
        if ($resource) {
            return [
                "id" => $resource->id,
                "libelle"=>$resource->libelle,
                "code"=>$resource->code,
                "description"=>$resource->description,
                "photo"=>$resource->photo,
                "caracteristiques"=> CaracteristiqueProduitResource::collection($resource->caracteristiques_prods),
                "succursales"=>ProduitSuccursaleResource::collection($resource->produit_succursales),
            ];
        }
        else{
            return ;
        }
    }
}

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
                "id" => $resource[0]->id,
                "libelle"=>$resource[0]->nom,
                "code"=>$resource[0]->code,
                "description"=>$resource[0]->description,
                "photo"=>$resource[0]->photo,
                // "caracteristiques"=>$resource[0]->caracteristiques,
                "caracteristiques"=> CaracteristiqueProduitResource::collection($resource[0]->caracteristiques),
                // "succursales"=>$resource[0]->succursales,
                "succursales"=>ProduitSuccursaleResource::collection($resource[0]->succursales),
            ];
        }
        else{
            return ;
        }
    }
}

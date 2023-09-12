<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SuccursaleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function __construct($collection){
        $this->collection=$collection;
    }
    public function toArray(Request $request): array
    {
        return [
            'message' => '',
            'data' => $this->collection->toArray()['data'],
            'statut'=>Response::HTTP_OK,
            'links' => $this->collection->toArray()['links']
        ];
    }
}

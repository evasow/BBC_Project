<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProduitSuccursale extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];

    public function succursale()
    {
        return $this->belongsTo(Succursale::class);
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}

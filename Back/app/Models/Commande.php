<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commande extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    public function produits_succursale(){
        return $this->belongsToMany(ProduitSuccursale::class,'produit_commandes');
    }
}

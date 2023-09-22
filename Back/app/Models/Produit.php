<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];
    public function produit_succursales()
    {
        return $this->hasMany(ProduitSuccursale::class);
    }
 
    public function caracteristiques_prods()
    {
        return $this->hasMany(CaracteristiquesProd::class);
    }
    public function caracteristiques()
    {
        return $this->belongsToMany(Caracteristiques::class,'caracteristiques_prods')
                    ->withPivot('valeur','unite_id','caracteristiques_id ');
    }
    public function succursales()
    {
        return $this->belongsToMany(Succursale::class,'produit_succursales')
                    ->withPivot('quantite_stock','prix_unitaire','prix_gros');
    }
}

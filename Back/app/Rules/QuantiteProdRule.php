<?php

namespace App\Rules;

use App\Models\ProduitSuccursale;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class QuantiteProdRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
          foreach ($value as $produit) {
            $produit_succ= ProduitSuccursale::where("id", $produit["produit_succursale_id"])->first();
            if ($produit_succ->quantite_stock < $produit["quantite"]) {
               $fail("La quantité choisie pour l'article est superieur au stock !");
            }
        }
    }
}

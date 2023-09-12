<?php

use App\Models\Produit;
use App\Models\Succursale;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produit_succursales', function (Blueprint $table) {
            $table->id();
            $table->float('quantite_stock');
            $table->bigInteger('prix_unitaire');
            $table->bigInteger('prix_gros');
            $table->foreignIdFor(Produit::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Succursale::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_succursales');
    }
};

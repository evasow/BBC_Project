<?php

use App\Models\Commande;
use App\Models\ProduitSuccursale;
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
        Schema::create('produit_commandes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('prix');
            $table->float('quantite');
            $table->integer('reduction')->nullable();
            $table->foreignIdFor(Commande::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(ProduitSuccursale::class)->constrained()->cascadeOnDelete();
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_commandes');
    }
};

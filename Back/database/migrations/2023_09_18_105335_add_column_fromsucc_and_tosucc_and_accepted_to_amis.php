<?php

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
        Schema::table('amis', function (Blueprint $table) {
            $table->foreignId("from_succ")->constrained("succursales");
            $table->foreignId("to_succ")->constrained("succursales");
            $table->boolean("accepted")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('amis', function (Blueprint $table) {
            //
        });
    }
};

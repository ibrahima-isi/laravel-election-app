<?php

use App\Models\Programme;
use App\Models\Secteur;
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
        Schema::create('programme_secteur', function (Blueprint $table){
            $table->foreignIdFor(Programme::class)->constrained()->cascadeOnUpdate()->cascadeOnUpdate();
            $table->foreignIdFor(Secteur::class)->constrained()->cascadeOnUpdate()->cascadeOnUpdate();
            $table->primary(['programme_id', 'secteur_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programme_secteur');
    }
};

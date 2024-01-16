<?php

use App\Models\Candidat;
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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('parti')->nullable();
            $table->text('biographie')->nullable();
            $table->boolean('validation')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });

//        Schema::table('programmes', function (Blueprint $table){
//            $table->foreignIdFor(Candidat::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
//        Schema::table('programmes', function (Blueprint $table){
//            $table->dropForeignIdFor(Candidat::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
//        });
    }
};

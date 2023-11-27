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
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->enum('categorie',['luxe','moyen']);
            $table->string('image');
            $table->text('description');
            $table->enum('statu',['disponible','occupe']);
            $table->string('adresse');
            $table->string('nombreChambre');
            $table->string('nombreToilette');
            $table->string('nombreBalcon');
            $table->string('espaceVert');
            $table->foreignId('users_id')->constrained();
            $table->date('datePublication');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens');
    }
};

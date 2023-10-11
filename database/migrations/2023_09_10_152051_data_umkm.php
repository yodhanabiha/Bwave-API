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
        Schema::create('dataumkm', function (Blueprint $table) {
            $table->id(); 
            $table->string('image')->nullable();
            $table->string('title');
            $table->bigInteger('view'); 
            $table->bigInteger('review');
            $table->double('rating');
            $table->string('description');
            $table->double('latitude');
            $table->double('longitude');
            $table->time('time_open')->nullable();
            $table->time('time_close')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviewumkm');
        Schema::dropIfExists('viewumkm');
        Schema::dropIfExists('likeumkm');
        Schema::dropIfExists('dataumkm');
    }
};

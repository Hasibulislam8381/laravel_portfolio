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
        Schema::create('sub_areas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->constrained();
            $table->string('name');
            $table->string('slug');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('photo');
            $table->string('video')->nullable();
            $table->string('section');
            $table->string('status')->default('publish');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_areas');
    }
};

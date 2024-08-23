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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('sub_area_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('requirement_types_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->longText('content')->nullable();
            $table->string('status')->default('publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};

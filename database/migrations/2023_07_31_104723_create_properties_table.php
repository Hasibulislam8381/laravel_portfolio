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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('sub_area_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('requirement_types_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->string('photo');
            $table->string('bedroom');
            $table->string('bathroom');
            $table->string('garage');
            $table->string('year_built');
            $table->string('property_size');
            $table->string('property_purpose');
            $table->string('interior');
            $table->string('balcony');
            $table->string('registration_type');
            $table->string('parking');
            $table->string('house_rules');
            $table->string('lift');
            $table->string('front_road_size');
            $table->string('floor');
            $table->string('common_area');
            $table->string('unit');
            $table->string('nearby_landmark');
            $table->string('unit_per_floor');
            $table->string('preferred_tenant');
            $table->string('total_units');
            $table->string('gas');
            $table->string('price');
            $table->string('servant_room');
            $table->string('servant_washroom');
            $table->string('service_charge');
            $table->string('apartment_facing');
            $table->string('garage_size');
            $table->string('property_id');
            $table->string('address');
            $table->string('city');
            $table->string('zip_code');
            $table->string('country');
            $table->longText('features');
            $table->string('tags');
            $table->string('meta_photo');
            $table->string('alt_text');
            $table->string('date');
            $table->longText('description');
            $table->string('m_title')->nullable();
            $table->string('m_keyword')->nullable();
            $table->longText('m_description')->nullable();
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
        Schema::dropIfExists('properties');
    }
};

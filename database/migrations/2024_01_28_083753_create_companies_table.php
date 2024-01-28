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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('organization_type_id')->constrained('organization_types');
            $table->foreignId('industry_type_id')->constrained('industry_types');
            $table->integer('team_size');
            $table->date('year_of_establishment');
            $table->string('web_site');
            $table->longText('vision')->nullable();
            $table->string('logo_url');
            $table->string('banner_url')->nullable();
            $table->longText('about_us')->nullable();
            $table->point('coordinates')->nullable();
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->json('social_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};

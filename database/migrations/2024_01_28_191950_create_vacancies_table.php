<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('rol_id');
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->string('salary_type');
            $table->boolean('education');
            $table->integer('experience');
            $table->string('job_type');
            $table->date('expiration_date');
            $table->string('level');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->longText('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};

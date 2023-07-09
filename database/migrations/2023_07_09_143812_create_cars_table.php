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
        Schema::create('cars', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->string('name');
            $table->string('model');
            $table->string('platenumber')->unique();
            $table->string('status');
            $table->boolean('availability');
            $table->text('description')->nullable();
            $table->string('gearbox');
            $table->integer('numberofseats');
            $table->string('fueltype');
            $table->integer('horsepower');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

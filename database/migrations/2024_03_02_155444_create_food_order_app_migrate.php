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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('meal_time', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('meal_name', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('meal_time_id');

            $table->foreign('restaurant_id')
                ->references('id')
                ->on('restaurants')
                ->onDelete('cascade');

            $table->foreign('meal_time_id')
                ->references('id')
                ->on('meal_name')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};

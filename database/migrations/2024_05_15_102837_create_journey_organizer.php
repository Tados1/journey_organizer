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
        Schema::create('journey', function (Blueprint $table) {
            $table->id('journey_id');
            $table->string('user_id');
            $table->timestamps();
            $table->string('title', 30);
            $table->string('more_info')->nullable();
        });

        Schema::create('departure', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('journey_id');
            $table->enum('transport_type', ['car', 'bus', 'train', 'airplane', 'ship']);
            $table->dateTime('departure_time'); 
            $table->dateTime('arrival_time'); 
            $table->string('from_place', 30);
            $table->string('to_place', 30);
            $table->string('departure_info')->nullable();
            $table->timestamps();
        });

        Schema::create('day', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('journey_id');
            $table->enum('day', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']); 
            $table->enum('transport_type', ['car', 'bus', 'train', 'airplane', 'ship'])->nullable(); 
            $table->dateTime('departure_time')->nullable(); 
            $table->dateTime('arrival_time')->nullable(); 
            $table->string('from_place', 30)->nullable();
            $table->string('to_place', 30)->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('arrival', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('journey_id');
            $table->enum('transport_type', ['car', 'bus', 'train', 'airplane', 'ship']);
            $table->dateTime('departure_time'); 
            $table->dateTime('arrival_time'); 
            $table->string('from_place', 30);
            $table->string('to_place', 30);
            $table->string('arrival_info')->nullable();
            $table->timestamps();
        });

        Schema::create('packing', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('journey_id');
            $table->string('items');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journey');
        Schema::dropIfExists('departure');
        Schema::dropIfExists('day');
        Schema::dropIfExists('arrival');
        Schema::dropIfExists('packing');
    }
};


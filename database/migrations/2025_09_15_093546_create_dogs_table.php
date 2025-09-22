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
        Schema::create('dogs', function (Blueprint $table) {
            $table->increments('dog_id'); 
            $table->unsignedInteger('admin_id'); 
            $table->string('name', 50);
            $table->string('breed', 50);
            $table->integer('age');
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('size', ['Small', 'Medium', 'Large', 'Extra Large']);
            $table->string('temperament', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('image_path', 255)->nullable();
            $table->integer('created_by')->nullable();
            $table->enum('status', ['Available', 'Unavailable'])->default('Available');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dogs');
    }
};

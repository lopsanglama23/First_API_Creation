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
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('application_id'); 
            $table->unsignedInteger('user_id'); 
            $table->unsignedInteger('dog_id');
            $table->dateTime('application_date');
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->text('notes')->nullable();
            $table->string('full_name', 100);
            $table->string('email', 100);
            $table->string('phone', 20);
            $table->text('address');
            $table->enum('housing_type', ['House', 'Apartment', 'Condo']);
            $table->enum('has_yard', ['Yes', 'No']);
            $table->enum('has_children', ['Yes', 'No']);
            $table->enum('has_other_pets', ['Yes', 'No']);
            $table->text('work_schedule');
            $table->text('previous_experience');
            $table->text('adoption_reason');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};

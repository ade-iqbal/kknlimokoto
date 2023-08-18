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
        Schema::disableForeignKeyConstraints();

        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('citizen_name');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->enum('gender', ["M","F"]);
            $table->string('religion');
            $table->string('occupation');
            $table->foreignId('jorong_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('date');
            $table->string('need');
            $table->string('ref_number')->nullable();
            $table->string('property_taxes')->nullable();
            $table->date('accepted_date')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};

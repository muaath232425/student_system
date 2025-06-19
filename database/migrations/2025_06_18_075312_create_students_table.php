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
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone')->nullable();
        $table->string('address')->nullable();

        // New Foreign Keys (nullable + set null on delete)
        $table->unsignedBigInteger('subject_id')->nullable();
        $table->unsignedBigInteger('teacher_id')->nullable();

        $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('set null');
        $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

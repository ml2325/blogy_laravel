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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('post_id')->constrained();
            $table->string('email');
            $table->string('website');
            $table->string('message');
            $table->unsignedBigInteger('parent_id')->nullable(); // New column
            $table->timestamps();

            // Foreign key relationship with parent comment
            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

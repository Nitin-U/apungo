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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('profile_picture')->nullable();
            $table->string('title')->nullable();
            $table->text('about_me')->nullable();
            $table->unsignedSmallInteger('experience')->default(0);
            $table->decimal('rating', 3, 2)->default(0);
            $table->boolean('verified')->default(false);
            $table->boolean('availability')->default(true);
            $table->boolean('agreement')->default(false);
            $table->baseColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};

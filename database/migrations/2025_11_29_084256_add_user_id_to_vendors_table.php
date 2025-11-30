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
        Schema::table('vendors', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // Add the column
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // Set Foreign Key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop Foreign Key first
            $table->dropColumn('user_id');    // Then drop column
        });
    }
};

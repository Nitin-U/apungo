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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('slug')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('contact')->nullable();
            $table->text('address')->nullable();
            $table->enum('gender', ['male','female','others'])->default('others');
            $table->boolean('status')->default(0);
            $table->text('oauth_id')->nullable();
            $table->text('oauth_type')->nullable();
            $table->enum('user_type', ['admin','customer','vendor'])->default('customer');
            $table->text('about')->nullable();
            $table->string('cover')->nullable();
            $table->text('fb')->nullable();
            $table->text('insta')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

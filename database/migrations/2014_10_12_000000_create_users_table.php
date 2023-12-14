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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar', 2048)->nullable();
            $table->rememberToken();
            $table->enum('account_type', ['Private', 'Professional']);
            $table->tinyInteger('status')->default(0);
            $table->integer('total_bings')->default(0);
            $table->integer('bings_balance')->default(0);
            $table->string('referral_code')->nullable();
            $table->unsignedBigInteger('referred_by')->nullable();
            $table->string('verification_code')->nullable();
            $table->text('device_token')->nullable();
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

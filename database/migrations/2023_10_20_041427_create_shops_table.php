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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('sub_category_id')->nullable();
            $table->string('shop_category')->nullable();
            $table->longText('sub_category')->nullable();
            $table->longText('sub_sub_category')->nullable();
            $table->string('name')->nullable();
            $table->integer('loyalty_card')->default(0);
            $table->string('visit_time')->nullable();
            $table->string('visit_gift')->nullable();
            $table->longText('description')->nullable();
            $table->string('profile_image')->nullable();
            $table->longText('cover_photo')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->string('website_url')->nullable();
            $table->integer('bings_discount')->default(3);
            $table->tinyInteger('is_open')->default(1);
            $table->integer('visited')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};

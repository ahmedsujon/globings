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
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->unsignedBigInteger('time_plan_id')->nullable();
            $table->double('price', 20,2)->default(0);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->date('last_payment')->nullable();
            $table->date('next_payment')->nullable();
            $table->enum('payment_status', ['pending','paid'])->default('pending');
            $table->enum('paid_via', ['stripe','paypal'])->nullable();
            $table->string('stripe_transaction_id')->nullable();
            $table->string('paypal_payment_id')->nullable();
            $table->string('customer_token')->nullable();
            $table->longText('paypal_payment_info')->nullable();
            $table->tinyInteger('active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_subscriptions');
    }
};

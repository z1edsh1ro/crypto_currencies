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
        Schema::create('trades', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('buy_order_id')->nullable();
            $table->unsignedInteger('sell_order_id')->nullable();
            $table->text('message');
            $table->decimal('amount', 10, 2);
            $table->timestamps();

            $table->foreign('buy_order_id')
                  ->references('id')
                  ->on('orders');

            $table->foreign('sell_order_id')
                  ->references('id')
                  ->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};

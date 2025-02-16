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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table -> string('name') -> nullable();
            $table -> string('rec_address') -> nullable();
            $table -> string('phone_number') -> nullable();
            $table -> string('status') -> default('In progress');
            $table -> unsignedBigInteger('user_id');
            $table -> unsignedBigInteger('product_id');

            $table -> foreign('user_id') -> reference('id') -> on('users')->onDelete('cascade');
            $table -> foreign('product_id') -> reference('id') -> on('product_tables')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

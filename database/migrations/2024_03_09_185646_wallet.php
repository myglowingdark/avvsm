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
        Schema::dropIfExists('wallet');
        Schema::create('wallet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('franchise_id');
            $table->float('amount');
            $table->foreign('franchise_id')->references('id')->on('franchise')->onDelete('cascade');
            $table->decimal('transactionid', 10, 2);
            $table->boolean('paid_status')->default(false);
            $table->string('comments',300)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet');
    }
};

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
        if (!Schema::hasTable('franchise')) {
        Schema::create('franchise', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade'); # get User model data usinng user_id
            $table->string("franchise_id")->unique();
            $table->string('owner_name')->nullable();
            $table->string('state')->nullable();
            $table->text('address')->nullable();
            $table->string('adhar_card')->nullable();
            $table->string('adhar_card_no')->nullable();
            $table->string('pan_card_no')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('signature')->nullable();
            $table->string('passport_photo')->nullable();
            $table->text('center_address')->nullable();
            $table->float('wallet_amount')->default(0.0);
            $table->string('center_contact_no')->nullable();
            $table->text('tenure')->nullable();
            $table->timestamps();

        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchise');
        Schema::table('franchise', function (Blueprint $table) {
            if (Schema::hasColumn('franchise', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });;
    }
};

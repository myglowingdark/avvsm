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
        Schema::create('studentenquiry', function (Blueprint $table) {
            $table->id();
            $table->char('center', 36);
            $table->foreign("center")->references("franchise_id")->on("franchise")->onDelete('cascade');  # get franchise model data usinng franchise_id
            $table->string('counselor_name');
            $table->string('candidate_name');
            $table->string('father_name');
            $table->string('contact_no');
            $table->string('whatsapp_no');
            $table->enum('gender', ['M', 'F','O'])->nullable();
            $table->string('email')->unique();
            $table->enum('marital_status', ['married', 'unmarried'])->nullable();
            $table->date('date_of_birth');
            $table->string('qualification');
            $table->string('interested_course');
            $table->string('interested_course_duration');
            $table->string('suggested_course');
            $table->string('suggested_course_duration');
            $table->decimal('course_fee', 10, 2);
            $table->decimal('discount_fee', 10, 2);
            $table->string('state');
            $table->string('district');
            $table->string('pincode');
            $table->text('address');
            $table->text('remark');
            $table->date('date_of_enquiry');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentenquiry');
    }
};

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
        if (!Schema::hasTable('student')) {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->char('center', 36);
            $table->foreign("center")->references("franchise_id")->on("franchise")->onDelete('cascade');  # get franchise model data usinng franchise_id
            $table->string('student_id'); //reg no
            $table->string('email');
            $table->string('student_name');
            $table->string('father_name');
            $table->string('date_of_birth');
            $table->enum('gender', ['M', 'F','O'])->nullable();
            $table->enum('marital_status', ['married', 'unmarried'])->nullable();
            $table->integer('year');
            $table->string('profile_photo');
            $table->string('student_signature');
            $table->string('course_duration');
            $table->string('address');
            $table->string('course_name');
            // $table->foreign("course_name")->references("id")->on("courses")->onDelete('cascade');  # get franchise model data usinng franchise_id
           
            $table->string('state');
            $table->string('district');
            $table->string('date_of_admission');
            $table->enum('register_status',['R', 'U'])->default("U");
            $table->timestamps();


        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
        Schema::table('student', function (Blueprint $table) {
            if (Schema::hasColumn('student', 'center')) {
                $table->dropForeign(['center']);
                $table->dropColumn('center');
            }
            if (Schema::hasColumn('student', 'course_name')) {
                // Ensure foreign key constraint exists before attempting to drop it
                if (Schema::hasTable('courses') && Schema::hasColumn('courses', 'id')) {
                    $table->dropForeign(['course_name']);
                }
                $table->dropColumn('course_name');
            }
        });
    }
};

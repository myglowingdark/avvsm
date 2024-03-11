<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (Schema::hasTable('studentenquiry') && !Schema::hasTable('enquiryform')) {
            Schema::rename('studentenquiry', 'enquiryform');
        }
    }

    public function down()
    {
        if (Schema::hasTable('enquiryform') && !Schema::hasTable('studentenquiry')) {
            Schema::rename('enquiryform', 'studentenquiry');
        }
    }
};

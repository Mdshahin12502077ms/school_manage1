<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id');
            $table->bigInteger('session_id');
            $table->string('edu_qualification');
            $table->string('reg_no');
            $table->string('result');
            $table->string('reg_board');
            $table->double('passing_year');
            $table->string('st_name');
            $table->string('f_name');
            $table->string('m_name');
            $table->string('gender');
            $table->string('id_type');
            $table->string('Date_of_birth');
            $table->double('id_number');
            $table->double('st_id_number');
            $table->string('religion');
            $table->string('class_roll');
            $table->string('email');
            $table->string('social_status');
            $table->string('mobile_no');
            $table->string('blood_group');
            $table->string('comment')->nullable();
            $table->string('student_photo');
            $table->string('id_document');
            $table->string('edu_certificate');
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};

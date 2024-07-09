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
        Schema::create('branch_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('branch_id');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('institute_age');
            $table->string('no_computer');
            $table->string('e_mail');

            $table->string('mobile_number');
            $table->string('additional_rel_name');
            $table->string('blood_group');
            $table->string('extra_rel_contact');
            $table->string('additional_mobile_no')->nullable();

            $table->string('ceo_profile')->nullable();
            $table->string('national_id');
            $table->string('educational_skill');
            $table->string('institute_image')->nullable();
            $table->string('trade_licence');

            $table->string('extra_file')->nullable();
            $table->string('ceo_facebook')->nullable();
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
        Schema::dropIfExists('branch_details');
    }
};

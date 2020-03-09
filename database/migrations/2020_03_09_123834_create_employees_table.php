<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('joining_date')->nullable();
            $table->bigInteger('mobile_no')->nullable();
            $table->mediumText('present_address')->nullable();
            $table->string('photo')->nullable();
            $table->string('designation_id')->nullable();
            $table->string('qualification')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('linkedIn_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('is_deleted')->default(0);
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

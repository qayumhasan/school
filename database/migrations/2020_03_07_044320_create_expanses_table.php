<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpansesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expanses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('expanse_header_id');
            $table->double('amount');
            $table->string('date');
            $table->string('year');
            $table->string('month');
            $table->boolean('status')->default(1);
            $table->boolean('is_deleted')->default(0);
            $table->timestamps();
            $table->foreign('expanse_header_id')->references('id')->on('expanse_headers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expanses');
    }
}

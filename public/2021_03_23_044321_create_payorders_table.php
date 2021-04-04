<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payorders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('supplier_id')->comment('supplier_id=user_id');
            $table->integer('tendername_id')->nullable();
            $table->integer('year_id')->nullable();
            $table->string('payorder_name')->nullable();
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
        Schema::dropIfExists('payorders');
    }
}

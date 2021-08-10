<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainTender1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main__tender1s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tender_id');
            $table->integer('user_id')->nullable();
            $table->double('tp_unit_price');
            $table->string('tp_brand_name')->nullable();
            $table->string('tp_orgin_name')->nullable();
            $table->string('tp_model_name')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=inactive,1=active');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('main__tender1s');
    }
}

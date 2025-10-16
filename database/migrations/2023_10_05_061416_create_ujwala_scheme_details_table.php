<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjwalaSchemeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujwala_scheme_details', function (Blueprint $table) {
            $table->bigIncrements('usd_id');
            $table->unsignedBigInteger('beneficiary_id')->nullable();
            $table->foreign('beneficiary_id')->references('beneficiary_id')->on('beneficiary_data');
            $table->string('avail_lpg');
            $table->integer('no_of_cylinders');
            $table->integer('use_lpg_inaday');
            $table->integer('months_onelpg_last');
            $table->integer('pay_one_lpg');
            $table->string('it_affordabale');
            $table->string('use_traditional_cookstove');
            $table->string('prob_face_lpg');
            $table->enum('status', ['Pending', 'Accepted', 'Cancel'])->default('Pending');
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
        Schema::dropIfExists('ujwala_scheme_details');
    }
}

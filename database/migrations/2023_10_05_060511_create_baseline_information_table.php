<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaselineInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baseline_information', function (Blueprint $table) {
            $table->bigIncrements('baseline_info_id');
            $table->unsignedBigInteger('beneficiary_id')->nullable();
            $table->foreign('beneficiary_id')->references('beneficiary_id')->on('beneficiary_data');
            $table->string('cookstove_type')->default('Gas');
            $table->string('photo_cookstove')->nullable();
            $table->string('no_of_meals')->default('350 to 600 calories each');
            $table->string('avg_time_per_meal');
            $table->string('fuel_type')->default('wood');
            $table->string('prob_procured');
            $table->string('purchase_receipts');
            $table->string('fuel_amount');
            $table->string('problems_current_cookstove');
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
        Schema::dropIfExists('baseline_information');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiaryDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiary_data', function (Blueprint $table) {
            $table->bigIncrements('beneficiary_id');
            $table->string('b_name');
            $table->string('father_name');
            $table->enum('gender', ["Male", "Female", "Other"]);
            $table->integer('age');
            $table->integer('fmly_members');
            $table->string('occupation');
            $table->integer('avg_mnthly_incm');
            $table->string('vlg_name');
            $table->string('teh_or_block_name');
            $table->string('panchayat_name');
            $table->string('district_name');
            $table->string('state_name');
            $table->string('b_img')->nullable();
            $table->integer('b_mobile');
            $table->integer('b_mo_adhr_or_smgr_no');
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
        Schema::dropIfExists('beneficiary_data');
    }
}

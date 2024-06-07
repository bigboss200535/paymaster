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
        Schema::create('salary', function (Blueprint $table) {
            $table->string('employee_id',50);
            $table->string('month',50); //1, 2,3,4,5,6,7,8,9,10,11,12 for months
            $table->string('year',50);
            $table->decimal('salary', 10,2);
            $table->decimal('ssnit_a', 10,2);
            $table->decimal('ssnit_b', 10,2);
            $table->decimal('ssnit_c', 10,2);
            $table->decimal('welfare_deduction', 10,2)->default('0');
            $table->decimal('medical_allowance', 10,2)->default('0');
            $table->decimal('transport_allowance', 10,2)->default('0');
            $table->decimal('other_allowance', 10,2)->default('0');
             $table->foreignUuid('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->string('added_by', 100)->nullable();
            $table->date('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->date('updated_date')->nullable();
            $table->string('status', 100)->default('Active');
            $table->string('archived', 100)->default('No');
            $table->date('archived_date')->nullable();
            $table->string('archived_by', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary');
    }
};

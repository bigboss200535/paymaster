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
        Schema::create('salary_account', function (Blueprint $table) {
            $table->string('employee_id');
            $table->string('bank', 100)->nullable();
            $table->string('bank_account', 50)->nullable();
            $table->decimal('basic_salary', 10,2);
            $table->string('allow_ssnit', 150)->default('1');
            $table->string('allow_paye', 150)->default('1');
            $table->string('allow_tier_2', 150)->default('1');
            $table->string('allow_tier_3', 150)->default('1');
            $table->string('welfare_deduction', 150)->default('1');
            $table->string('medical_allowance', 150)->default('0');
            $table->decimal('transport_allowance', 150)->default('0');
            $table->string('other_allowance', 10,2)->default('1');
            // $table->decimal('paye', 10,2);
            $table->string('ssnit_number',50)->nullable();
            $table->foreignUuid('user_id')->references('id')->on('users')->onUpdate('cascade');
            // $table->foreignId('user_id')->constrained('users')->onUpdate('cascade');
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
        Schema::dropIfExists('salary_account');
    }
};

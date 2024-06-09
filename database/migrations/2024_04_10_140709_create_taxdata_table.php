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
        Schema::create('tax_data', function (Blueprint $table) {
            $table->string('tax_id');
            $table->decimal('chargeable_income1',8,2);
            $table->decimal('chargeable_income2',10,2);
            $table->decimal('chargeable_income3',10,2);
            $table->decimal('chargeable_income4',10,2);
            $table->decimal('chargeable_income5',10,2);
            $table->decimal('chargeable_income6',10,2);
            $table->decimal('chargeable_income7',10,2);
            $table->decimal('rate',10,2);
            // $table->decimal('rate2',10,2);
            // $table->decimal('rate3',10,2);
            // $table->decimal('rate4',10,2);
            // $table->decimal('rate5',10,2);
            // $table->decimal('rate6',10,2);
            // $table->decimal('rate7',10,2);
            // $table->decimal('tax_charged1',10,2);
            // $table->decimal('tax_charged2',10,2);
            // $table->decimal('tax_charged3',10,2);
            // $table->decimal('tax_charged4',10,2);
            // $table->decimal('tax_charged5',10,2);
            // $table->decimal('tax_charged6',10,2);
            // $table->decimal('tax_charged7',10,2);
            // $table->decimal('cummulative_income1',10,2);
            // $table->decimal('cummulative_income2',10,2);
            // $table->decimal('cummulative_income3',10,2);
            // $table->decimal('cummulative_income4',10,2);
            // $table->decimal('cummulative_income5',10,2);
            // $table->decimal('cummulative_income6',10,2);
            // $table->decimal('cummulative_income7',10,2);
            $table->date('effective_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('expiry_status', 50)->nullable();
            // $table->string('user_id', 50)->default('1');
            $table->string('added_by', 100)->nullable();
            $table->date('added_date')->useCurrent();
            $table->string('updated_by', 100)->nullable();
            $table->date('updated_date')->nullable();
            $table->string('status', 100)->default('Active');
            $table->string('archived', 100)->default('No');
            $table->date('archived_date')->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->foreignUuid('user_id')->references('id')->on('users')->onUpdate('cascade');
            // $table->foreign('employee_id')->references('employee_id')->on('employee');
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_data');
    }
};

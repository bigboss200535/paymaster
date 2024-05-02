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
            $table->decimal('basic_salary', 10,2);
            $table->decimal('paye', 10,2);
            $table->decimal('ssnit_a', 10,2);
            $table->decimal('ssnit_b', 10,2);
            $table->decimal('ssnit_c', 10,2);
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade');
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

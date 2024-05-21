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
        Schema::create('employee_interview', function (Blueprint $table) {
            $table->string('id',50);
            $table->string('title',50);
            $table->string('firstname', 150);
            $table->string('middlename', 150)->nullable();
            $table->string('surname', 150);
            $table->string('image', 150)->nullable();
            $table->string('gender', 20);
            $table->date('birthdate');
            $table->string('email',100)->unique()->nullable();
            $table->string('telephone', 50)->unique()->nullable();
            $table->string('interviewed', 20)->default('No');
            $table->string('employed', 20)->default('No');
            $table->string('employability_reason', 250)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('gh_card', 50)->nullable();
            // $table->string('user_id', 50);
            $table->foreignUuid('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->string('file_number', 50)->nullable();
            $table->string('portfolio', 50)->nullable();
            $table->string('added_id', 50)->nullable();
            $table->string('barcode', 50)->nullable();
            $table->string('added_by', 100)->nullable();
            $table->date('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->date('updated_date')->nullable();
            $table->string('status', 100)->default('Active');
            $table->string('archived', 100)->default('No');
            $table->date('archived_date')->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->primary('id');
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
        Schema::dropIfExists('employee_interview');
    }
};

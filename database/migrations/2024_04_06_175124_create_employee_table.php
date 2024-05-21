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
        Schema::create('employee', function (Blueprint $table) {
            $table->string('employee_id',50);
            $table->string('title',50);
            $table->string('firstname', 150);
            $table->string('middlename', 150)->nullable();
            $table->string('surname', 150);
            $table->string('fullname')->virtualAs("CONCAT(title, '. ', surname, ' ', firstname)");
            $table->string('image', 150)->nullable();
            $table->string('gender', 20);
            $table->date('birthdate');
            $table->string('ssnit_number',50)->nullable();
            $table->string('staff_type',50)->nullable();
            $table->string('dormate', 20)->default('No');
            // $table->string('email',100)->unique()->nullable();
            $table->string('email',100)->nullable();
            $table->string('confirm_email', 20)->default('0');
            $table->string('telephone', 50)->unique()->nullable();
            $table->string('confirm_telephone', 20)->default('0');
            $table->string('verified', 20)->default('No');
            $table->string('religion', 50)->nullable();
            $table->string('address', 150)->nullable();
            $table->string('region', 50)->nullable();
            $table->string('gh_card', 50)->nullable();
            $table->foreignUuid('user_id')->references('id')->on('users')->onUpdate('cascade');
            // $table->foreignId('user_id')->constrained('users')->onUpdate('cascade');
            $table->string('application_process', 50)->nullable();
            $table->string('registration_type', 50)->nullable();
            $table->string('file_number', 50)->nullable();
            $table->string('portfolio', 150)->nullable();
            $table->string('bank', 100)->nullable();
            $table->string('bank_account', 50)->nullable();
            $table->string('allow_ssnit', 150)->default('1');
            $table->string('allow_paye', 150)->default('1');
            $table->string('department_id', 50)->nullable();
            $table->string('designation_id', 50)->nullable();
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
            $table->primary('employee_id');          
            $table->index(['firstname', 'surname', 'telephone']);
            // $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
};

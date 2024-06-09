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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('user_id')->primary();
            $table->string('firstname', 150);
            $table->string('othername', 150);
            $table->string('fullname')->virtualAs("CONCAT(othername, ' ', firstname)");
            $table->string('username', 150)->unique();
            $table->string('password', 100);
            $table->string('passwordsalt', 100)->nullable();
            $table->string('telephone', 100);
            $table->string('gender', 20);
            $table->string('confirm_telephone', 10)->default('0');
            $table->timestamp('telephone_verify_at')->nullable();
            $table->string('email')->unique();
            $table->string('confirm_email', 10)->default('0');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mode', 50)->nullable();
            $table->string('image', 150)->nullable();
            $table->string('role', 100)->nullable();
            $table->string('permission', 100)->nullable();
            $table->string('added_id', 50)->nullable();
            $table->string('added_by', 100)->nullable();
            $table->date('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->date('updated_date')->nullable();
            $table->string('status', 100)->default('Active');
            $table->string('archived', 100)->default('No');
            $table->date('archived_date')->nullable();
            $table->string('archived_by', 100)->nullable();
            // $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

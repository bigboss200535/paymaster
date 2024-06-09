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
        Schema::create('product', function (Blueprint $table) {
            $table->string('product_id',50);
            $table->string('product_name',50);
            $table->text('description')->nullable();
            $table->string('category_id',50);
            $table->string('stocked',50);
            $table->string('expirable',50);  
            $table->string('barcode',50)->nullable()->unique();
            $table->string('image',50)->nullable(); 
            $table->foreignUuid('user_id')->references('id')->on('users')->onUpdate('cascade');
            // $table->foreignId('user_id')->constrained('users')->onUpdate('cascade');         
            $table->string('added_id', 50)->nullable();
            $table->string('added_by', 100)->nullable();
            $table->date('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->date('updated_date')->nullable();
            $table->string('status', 100)->default('Active');
            $table->string('archived', 100)->default('No');
            $table->date('archived_date')->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->primary('product_id');
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('category_id')->references('category_id')->on('product_category');
            // $table->foreign('category_id')->references('category_id')->on('product_category')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};

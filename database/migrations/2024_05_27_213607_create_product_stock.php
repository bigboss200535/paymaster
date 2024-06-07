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
        Schema::create('product_stock', function (Blueprint $table) {
            // $table->int('stock_id',50);
            $table->string('product_id',50);
            $table->string('stock_quantity',50); 
            $table->date('inventory_date')->nullable();
            $table->date('expirydate')->nullable();  
            $table->string('reorder_level',50);  
            $table->string('status_flag')->nullable();
            $table->foreignUuid('user_id')->references('id')->on('users')->onUpdate('cascade');
            // $table->string('user_id', 50);  
            $table->string('store_id', 50);           
            $table->string('added_id', 50)->nullable();
            $table->string('added_by', 100)->nullable();
            $table->date('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->date('updated_date')->nullable();
            $table->string('status', 100)->default('Active');
            $table->string('archived', 100)->default('No');
            $table->date('archived_date')->nullable();
            $table->string('archived_by', 100)->nullable();
            // $table->primary('product_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('store_id')->references('store_id')->on('store');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_stock');
    }
};

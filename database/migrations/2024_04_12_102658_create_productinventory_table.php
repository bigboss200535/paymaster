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
        Schema::create('product_inventory', function (Blueprint $table) {
            $table->string('pi_id',50);
            $table->string('product_id',50);
            $table->string('batch_number',100);
            $table->date('inventory_date')->useCurrent();
            $table->date('production_date');
            $table->date('expirydate');  
            $table->float('stock_quantity',50);  
            $table->float('reorder_level',50);  
            $table->string('status_flag');
            $table->foreignUuid('user_id')->references('id')->on('users')->onUpdate('cascade');
            // $table->string('user_id', 50);           
            $table->string('added_id', 50)->nullable();
            $table->string('added_by', 100)->nullable();
            $table->date('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->date('updated_date')->nullable();
            $table->string('status', 100)->default('Active');
            $table->string('archived', 100)->default('No');
            $table->date('archived_date')->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->primary('pi_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('product_id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_inventory');
    }
};

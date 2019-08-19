<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('supplier_id');
            $table->dateTime('date');
            $table->string('name')->default("");
            $table->integer('quantity')->default("0");
            $table->decimal('price', 8, 2)->default("0.00");
            $table->decimal('discount', 8, 2)->nullable()->default("0.00");
            $table->decimal('tax', 8, 2)->nullable()->default("0.00");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}

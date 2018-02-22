<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('amount');
            $table->string('payment_method');
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}

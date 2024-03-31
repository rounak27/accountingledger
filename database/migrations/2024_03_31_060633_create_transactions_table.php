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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('trn_id')->unique();
            $table->date('trn_date');
            $table->string('particular');
            $table->decimal('debit', 10, 2)->nullable();
            $table->decimal('credit', 10, 2)->nullable();
            $table->decimal('trn_balance', 10, 2)->nullable(); // Add trn_balance field
            $table->string('uid');
            $table->foreign('uid')->references('cid')->on('customers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};

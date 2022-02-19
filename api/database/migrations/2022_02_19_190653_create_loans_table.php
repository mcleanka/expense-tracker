<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('user_id');

            $table->unsignedBigInteger('income_id');
            $table->foreign('income_id')
                ->references('id')
                ->on('incomes')
                ->onDelete('cascade');

            $table->date("payback_date");
            $table->decimal('payback_interest', $precision = 8, $scale = 2);

            $table->boolean('paid');
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
        Schema::dropIfExists('loans');
    }
}
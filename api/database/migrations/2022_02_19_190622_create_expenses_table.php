<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');

            $table->unsignedBigInteger('income_id');
            $table->foreign('income_id')
                ->references('id')
                ->on('incomes')
                ->onDelete('cascade');

            $table->string("name", 255);
            $table->text("description");
            $table->string("owner", 255);
            $table->decimal('amount', $precision = 8, $scale = 2);
            $table->date("date");
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
        Schema::dropIfExists('expenses');
    }
}
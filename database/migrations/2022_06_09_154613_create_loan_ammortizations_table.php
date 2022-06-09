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
        Schema::create('loan_ammortizations', function (Blueprint $table) {
            $table->id();
            $table->integer('base_loan_calculator_id');
            $table->decimal('loan_amount', 18, 2);
            $table->decimal('interest_rate', 18, 2);
            $table->decimal('ammortization_period', 18, 2);
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
        Schema::dropIfExists('loan_ammortizations');
    }
};

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
        Schema::create('loan_ammortization_details', function (Blueprint $table) {
            $table->id();
            $table->integer('loan_ammortization_id');
            $table->integer('month');
            $table->decimal('payment', 18, 2);
            $table->decimal('principal', 18, 2);
            $table->decimal('interest', 18, 2);
            $table->decimal('balance', 18, 2);
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
        Schema::dropIfExists('loan_ammortization_details');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_goals', function (Blueprint $table) {
            $table->id();
            $table->string('financial_goals');
            $table->string('goal_time_frame');
            $table->string('risk_tolerance');
            $table->string('time_horizon');
            $table->string('investment_experience');
            $table->string('annual_income');
            $table->string('monthly_savings');
            $table->string('major_expenses');
            $table->string('outstanding_debts');
            $table->string('loan_amount')->nullable();
            $table->string('interest_rate')->nullable();
            $table->string('emergency_fund');
            $table->string('emergency_fund_amount')->nullable();
            $table->json('investment_types')->nullable();
            $table->json('investment_rate')->nullable();
            $table->json('financial_considerations')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_id'); // Foreign key column
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
        Schema::dropIfExists('form_goals');
    }
}

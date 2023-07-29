<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormGoal extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // Add user_id to the fillable attributes
        'financial_goals',
        'goal_time_frame',
        'risk_tolerance',
        'time_horizon',
        'investment_experience',
        'annual_income',
        'monthly_savings',
        'major_expenses',
        'outstanding_debts',
        'loan_amount',
        'interest_rate',
        'emergency_fund',
        'emergency_fund_amount',
        'investment_types',
        'investment_rate',
        'financial_considerations',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

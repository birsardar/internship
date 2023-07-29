<?php

namespace App\Http\Controllers;

use App\Models\FormGoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userdetail.goalsform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { // Validate the form data
        $request->validate([
            'financial_goals' => 'required',
            'goal_time_frame' => 'required',
            'risk_tolerance' => 'required',
            'time_horizon' => 'required',
            'investment_experience' => 'required',
            'annual_income' => 'required',
            'monthly_savings' => 'required',
            'major_expenses' => 'required',
            'outstanding_debts' => 'required',
            'emergency_fund' => 'required',
            'investment_types' => 'nullable|array',
            'investment_rate' => 'nullable|array',
            'financial_considerations' => 'nullable|array',
        ]);

        // Convert arrays to JSON
        $investmentTypes = json_encode($request->input('investment_types', []));
        $financialConsiderations = json_encode($request->input('financial_considerations', []));

        // Create a new user record
        $data = new FormGoal();
        $data->financial_goals = $request->input('financial_goals');
        $data->goal_time_frame = $request->input('goal_time_frame');
        $data->risk_tolerance = $request->input('risk_tolerance');
        $data->time_horizon = $request->input('time_horizon');
        $data->investment_experience = $request->input('investment_experience');
        $data->annual_income = $request->input('annual_income');
        $data->monthly_savings = $request->input('monthly_savings');
        $data->major_expenses = $request->input('major_expenses');
        $data->outstanding_debts = $request->input('outstanding_debts');
        $data->loan_amount = $request->input('loan_amount');
        $data->interest_rate = $request->input('interest_rate');
        $data->emergency_fund = $request->input('emergency_fund');
        $data->emergency_fund_amount = $request->input('emergency_fund_amount');
        $data->investment_types = $investmentTypes;
        $data->financial_considerations = $financialConsiderations;

        $data->user_id = Auth::user()->id;
        $data->save();

        return redirect()->route('userdetail.index')->with('success', 'Manager Created Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

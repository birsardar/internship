@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('form.store') }}">
            @csrf
            @method('post')

            {{-- Financial Goals --}}
            <h3>Financial Goals:</h3>
            <p>What are your primary financial goals?</p>
            <select name="financial_goals">
                <option value="retirement" {{ old('financial_goals') === 'retirement' ? 'selected' : '' }}>Retirement
                </option>
                <option value="buying_house" {{ old('financial_goals') === 'buying_house' ? 'selected' : '' }}>Buying a House
                </option>
                <option value="education" {{ old('financial_goals') === 'education' ? 'selected' : '' }}>Education</option>
                <option value="travel" {{ old('financial_goals') === 'travel' ? 'selected' : '' }}>Travel</option>
            </select>
            <p>When do you hope to achieve these goals?</p>
            <select name="goal_time_frame">
                <option value="short_term" {{ old('goal_time_frame') === 'short_term' ? 'selected' : '' }}>Short-term
                </option>
                <option value="medium_term" {{ old('goal_time_frame') === 'medium_term' ? 'selected' : '' }}>Medium-term
                </option>
                <option value="long_term" {{ old('goal_time_frame') === 'long_term' ? 'selected' : '' }}>Long-term</option>
            </select>

            {{-- Risk Tolerance --}}
            <h3>Risk Tolerance:</h3>
            <p>How comfortable are you with taking financial risks to achieve higher returns?</p>
            <select name="risk_tolerance">
                <option value="very_risk_averse" {{ old('risk_tolerance') === 'very_risk_averse' ? 'selected' : '' }}>Very
                    Risk-Averse</option>
                <option value="somewhat_risk_averse"
                    {{ old('risk_tolerance') === 'somewhat_risk_averse' ? 'selected' : '' }}>Somewhat Risk-Averse</option>
                <option value="neutral" {{ old('risk_tolerance') === 'neutral' ? 'selected' : '' }}>Neutral</option>
                <option value="somewhat_risk_tolerant"
                    {{ old('risk_tolerance') === 'somewhat_risk_tolerant' ? 'selected' : '' }}>Somewhat Risk-Tolerant
                </option>
                <option value="very_risk_tolerant" {{ old('risk_tolerance') === 'very_risk_tolerant' ? 'selected' : '' }}>
                    Very Risk-Tolerant</option>
            </select>

            {{-- Time Horizon --}}
            <h3>Time Horizon:</h3>
            <p>How long do you plan to keep your investments before needing the funds?</p>
            <select name="time_horizon">
                <option value="less_than_1_year" {{ old('time_horizon') === 'less_than_1_year' ? 'selected' : '' }}>Less
                    than 1 year</option>
                <option value="1_to_5_years" {{ old('time_horizon') === '1_to_5_years' ? 'selected' : '' }}>1 to 5 years
                </option>
                <option value="5_to_10_years" {{ old('time_horizon') === '5_to_10_years' ? 'selected' : '' }}>5 to 10 years
                </option>
                <option value="10_to_20_years" {{ old('time_horizon') === '10_to_20_years' ? 'selected' : '' }}>10 to 20
                    years</option>
                <option value="20_plus_years" {{ old('time_horizon') === '20_plus_years' ? 'selected' : '' }}>20+ years
                </option>
            </select>

            {{-- Investment Experience --}}
            <h3>Investment Experience:</h3>
            <p>How would you describe your investment knowledge and experience?</p>
            <select name="investment_experience">
                <option value="novice" {{ old('investment_experience') === 'novice' ? 'selected' : '' }}>Novice (Little to
                    no experience)</option>
                <option value="beginner" {{ old('investment_experience') === 'beginner' ? 'selected' : '' }}>Beginner
                    (Limited knowledge)</option>
                <option value="intermediate" {{ old('investment_experience') === 'intermediate' ? 'selected' : '' }}>
                    Intermediate (Moderate knowledge)</option>
                <option value="advanced" {{ old('investment_experience') === 'advanced' ? 'selected' : '' }}>Advanced
                    (Experienced with various investment options)</option>
            </select>

            {{-- Income and Expenses --}}
            <h3>Income and Expenses:</h3>
            <p>What is your annual income range?</p>
            <select name="annual_income">
                <option value="below_25000" {{ old('annual_income') === 'below_25000' ? 'selected' : '' }}>Below $25,000
                </option>
                <option value="25000_to_50000" {{ old('annual_income') === '25000_to_50000' ? 'selected' : '' }}>$25,000 -
                    $50,000</option>
                <option value="50000_to_75000" {{ old('annual_income') === '50000_to_75000' ? 'selected' : '' }}>$50,000 -
                    $75,000</option>
                <option value="75000_to_100000" {{ old('annual_income') === '75000_to_100000' ? 'selected' : '' }}>$75,000
                    - $100,000</option>
                <option value="above_100000" {{ old('annual_income') === 'above_100000' ? 'selected' : '' }}>Above $100,000
                </option>
            </select>
            <p>How much do you typically save or invest each month?</p>
            <select name="monthly_savings">
                <option value="below_100" {{ old('monthly_savings') === 'below_100' ? 'selected' : '' }}>Below $100
                </option>
                <option value="100_to_500" {{ old('monthly_savings') === '100_to_500' ? 'selected' : '' }}>$100 - $500
                </option>
                <option value="500_to_1000" {{ old('monthly_savings') === '500_to_1000' ? 'selected' : '' }}>$500 - $1,000
                </option>
                <option value="1000_to_5000" {{ old('monthly_savings') === '1000_to_5000' ? 'selected' : '' }}>$1,000 -
                    $5,000</option>
                <option value="above_5000" {{ old('monthly_savings') === 'above_5000' ? 'selected' : '' }}>Above $5,000
                </option>
            </select>
            <p>What are your major monthly expenses?</p>
            <input type="text" name="major_expenses">

            {{-- Debt and Liabilities --}}
            <h3>Debt and Liabilities:</h3>
            <p>Do you have any outstanding debts or loans?</p>
            <select name="outstanding_debts">
                <option value="credit_card_debt" {{ old('outstanding_debts') === 'credit_card_debt' ? 'selected' : '' }}>
                    Credit Card Debt</option>
                <option value="student_loans" {{ old('outstanding_debts') === 'student_loans' ? 'selected' : '' }}>Student
                    Loans</option>
                <option value="mortgage" {{ old('outstanding_debts') === 'mortgage' ? 'selected' : '' }}>Mortgage</option>
                <option value="car_loan" {{ old('outstanding_debts') === 'car_loan' ? 'selected' : '' }}>Car Loan</option>
                <option value="none" {{ old('outstanding_debts') === 'none' ? 'selected' : '' }}>None</option>
            </select>
            <div>
                @if (in_array(old('outstanding_debts'), ['credit_card_debt', 'student_loans', 'mortgage', 'car_loan']))
                    <p>Provide details about the outstanding amounts and interest rates:</p>
                    <label>Loan Amount:</label>
                    <input type="text" name="loan_amount" value="{{ old('loan_amount') }}">
                    <label>Interest Rate:</label>
                    <input type="text" name="interest_rate" value="{{ old('interest_rate') }}">
                @endif
            </div>

            {{-- Emergency Fund --}}
            <h3>Emergency Fund:</h3>
            <p>Do you have an emergency fund set aside to cover unexpected expenses?</p>
            <select name="emergency_fund">
                <option value="yes" {{ old('emergency_fund') === 'yes' ? 'selected' : '' }}>Yes</option>
                <option value="no" {{ old('emergency_fund') === 'no' ? 'selected' : '' }}>No</option>
                <option value="working_on_it" {{ old('emergency_fund') === 'working_on_it' ? 'selected' : '' }}>Working on
                    it</option>
            </select>
            <div>
                @if (old('emergency_fund') === 'yes')
                    <p>How much is your emergency fund?</p>
                    <input type="text" name="emergency_fund_amount" value="{{ old('emergency_fund_amount') }}">
                @endif
            </div>

            {{-- Current Investment Portfolio --}}
            <h3>Current Investment Portfolio:</h3>
            <p>What types of investments do you currently hold?</p>
            <input type="checkbox" name="investment_types[]" value="stocks"
                {{ in_array('stocks', old('investment_types', [])) ? 'checked' : '' }}> Stocks<br>
            <input type="checkbox" name="investment_types[]" value="mutual_funds"
                {{ in_array('mutual_funds', old('investment_types', [])) ? 'checked' : '' }}> Mutual Funds<br>
            <input type="checkbox" name="investment_types[]" value="bonds"
                {{ in_array('bonds', old('investment_types', [])) ? 'checked' : '' }}> Bonds<br>
            <input type="checkbox" name="investment_types[]" value="real_estate"
                {{ in_array('real_estate', old('investment_types', [])) ? 'checked' : '' }}> Real Estate<br>
            <input type="checkbox" name="investment_types[]" value="others"
                {{ in_array('others', old('investment_types', [])) ? 'checked' : '' }}> Others (Specify)<br>
            <div>
                @if (in_array('stocks', old('investment_types', [])) ||
                        in_array('mutual_funds', old('investment_types', [])) ||
                        in_array('bonds', old('investment_types', [])) ||
                        in_array('real_estate', old('investment_types', [])) ||
                        in_array('others', old('investment_types', [])))
                    <p>Enter the rate (performance %) for each option selected:</p>
                    @foreach (old('investment_types', []) as $type)
                        <label>{{ ucfirst(str_replace('_', ' ', $type)) }}:</label>
                        <input type="text" name="investment_rate[{{ $type }}]"
                            value="{{ old('investment_rate.' . $type, '') }}">
                    @endforeach
                @endif
            </div>

            {{-- Additional Considerations --}}
            <h3>Additional Considerations:</h3>
            <p>Are there any specific financial considerations or constraints you would like us to consider?</p>
            <input type="checkbox" name="financial_considerations[]" value="tax_implications"
                {{ in_array('tax_implications', old('financial_considerations', [])) ? 'checked' : '' }}> Tax
            Implications<br>
            <input type="checkbox" name="financial_considerations[]" value="idea_investing"
                {{ in_array('idea_investing', old('financial_considerations', [])) ? 'checked' : '' }}> Idea Investing<br>

            {{-- Submit button --}}
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection

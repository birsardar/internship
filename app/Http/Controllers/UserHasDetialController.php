<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserHasDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserHasDetialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $userDetails = UserHasDetail::where('user_id', $user->id)->first();

        // Check if user details exist, otherwise create a new instance
        if (!$userDetails) {
            $userDetails = new UserHasDetail();
        }

        return view('userdetail.details', compact('user', 'userDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $userdetails = UserHasDetail::where('id', $user->id)->first();
        return view('userdetail.cdetail', compact('userdetails', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'mobile_number' => 'nullable|string|max:14',
            'gender' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'about' => 'nullable|string',
        ]);



        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the user details for the authenticated user
        $user = Auth::user();
        $userDetails = UserHasDetail::where('user_id', $user->id)->first();

        if ($userDetails) {
            // If user details exist, update them
            $userDetails->update($request->all());
        } else {

            // Create a new user record
            $user = new UserHasDetail();
            $user->mobile_number = $request->input('mobile_number');
            $user->gender = $request->input('gender');
            $user->city = $request->input('city');
            $user->linkedin = $request->input('linkedin');
            $user->twitter = $request->input('twitter');
            $user->facebook = $request->input('facebook');
            $user->instagram = $request->input('instagram');
            $user->about = $request->input('about');
            $user->user_id = Auth::user()->id;
            $user->save();
        }

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
        $user = Auth::user()->id;
        $userdetails = UserHasDetail::where('user_id', $user)->first();
        return view('userdetail.editdetail', compact('userdetails', 'user'));
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

        $user = UserHasDetail::find($id);
        $all_data = $request->all();
        $all_data['updated_by'] = Auth::user()->id;
        $user->update($all_data);
        return redirect()->route('managers.index')->with('success', 'Manager Created Successfully');
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

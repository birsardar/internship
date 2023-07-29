<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('user_type', 'manager')->get();
        return view('admin.manager.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager.create');
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
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users', // Add a unique rule to ensure the username is unique
            'email' => 'required|email|unique:users', // Add a unique rule to ensure the email is unique
            'password' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new user record
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->avatar = $request->input('avatar');
        $user->user_type = 'manager';
        $user->save();

        return redirect()->route('managers.index')->with('success', 'Manager Created Successfully');
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


        // Find the user
        $user = User::findOrFail($id);

        // Return the user to the edit view
        return view('admin.manager.edit', compact('user'));
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


        $user = User::find($id);
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

        $data = User::find($id);
        $data->delete();
        return redirect()->route('managers.index')->with('success', 'Record has been deleted successfully!');
    }
    public function isActive(Request $request, $id)
    {
        $get_is_active = User::where('id', $id)->value('is_active');
        $isactive = User::find($id);
        if ($get_is_active == 0) {
            $isactive->is_active = 1;
            $notification = array(
                'message' => $isactive->name . ' is Active!',
                'alert-type' => 'success'
            );
        } else {
            $isactive->is_active = 0;
            $notification = array(
                'message' => $isactive->name . ' is inactive!',
                'alert-type' => 'error'
            );
        }
        if (!($isactive->update())) {
            $notification = array(
                'message' => $isactive->name . ' could not be changed!',
                'alert-type' => 'error'
            );
        }
        return back()->with($notification)->withInput();
    }
}

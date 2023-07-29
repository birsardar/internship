@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('userdetail.store', $user->id) }}" enctype="multipart/form-data">
            {{-- Replace 'update-profile' with the actual route for updating the user profile --}}
            @csrf {{-- Include the CSRF token --}}
            @method('post') {{-- Use 'PUT' method if updating, use 'POST' if creating a new profile --}}

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">User Profile</div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name"
                                        value="{{ old('first_name', $user->first_name) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name"
                                        value="{{ $user->last_name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile_number" class="col-md-4 col-form-label text-md-right">Mobile
                                    Number</label>
                                <div class="col-md-6">
                                    <input id="mobile_number" type="tel" class="form-control" name="mobile_number"
                                        value="{{ $user->mobile_number }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-6">
                                    <select id="gender" class="form-control" name="gender">
                                        <option
                                            value="Male"{{ old('gender', $user->gender) === 'Male' ? ' selected' : '' }}>
                                            Male</option>
                                        <option
                                            value="Female"{{ old('gender', $user->gender) === 'Female' ? ' selected' : '' }}>
                                            Female</option>
                                        <option
                                            value="Others"{{ old('gender', $user->gender) === 'Others' ? ' selected' : '' }}>
                                            Others</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city"
                                        value="{{ $user->city }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                                <div class="col-md-6">
                                    <input id="country" type="text" class="form-control" name="country"
                                        value="{{ $user->country }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="linkedin" class="col-md-4 col-form-label text-md-right">Linkedin</label>
                                <div class="col-md-6">
                                    <input id="linkedin" type="text" class="form-control" name="linkedin"
                                        value="{{ $user->linkedin }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="twitter" class="col-md-4 col-form-label text-md-right">Twitter</label>
                                <div class="col-md-6">
                                    <input id="twitter" type="text" class="form-control" name="twitter"
                                        value="{{ $user->twitter }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="facebook" class="col-md-4 col-form-label text-md-right">Facebook</label>
                                <div class="col-md-6">
                                    <input id="facebook" type="text" class="form-control" name="facebook"
                                        value="{{ $user->facebook }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="profile_pic" class="col-md-4 col-form-label text-md-right">Profile Pic</label>
                                <div class="col-md-6">
                                    <img src="{{ $user->avatar }}" alt="Profile Pic" width="100px" height="100px">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="about" class="col-md-4 col-form-label text-md-right">About</label>
                                <div class="col-md-6">
                                    <textarea id="about" class="form-control" name="about" rows="4">{{ $user->about }}</textarea>
                                </div>
                            </div>

                            {{-- Submit button --}}
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

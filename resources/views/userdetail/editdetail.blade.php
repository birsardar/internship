@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('userdetail.store', $userdetails->id) }}" enctype="multipart/form-data">
            {{-- Replace 'update-profile' with the actual route for updating the user profile --}}
            @csrf {{-- Include the CSRF token --}}
            @method('post') {{-- Use 'PUT' method if updating, use 'POST' if creating a new profile --}}

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">User Profile</div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="mobile_number" class="col-md-4 col-form-label text-md-right">Mobile
                                    Number</label>
                                <div class="col-md-6">
                                    <input id="mobile_number" type="tel" class="form-control" name="mobile_number"
                                        value="{{ $userdetails->mobile_number }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-6">
                                    <select id="gender" class="form-control" name="gender">
                                        <option
                                            value="Male"{{ old('gender', $userdetails->gender) === 'Male' ? ' selected' : '' }}>
                                            Male</option>
                                        <option
                                            value="Female"{{ old('gender', $userdetails->gender) === 'Female' ? ' selected' : '' }}>
                                            Female</option>
                                        <option
                                            value="Others"{{ old('gender', $userdetails->gender) === 'Others' ? ' selected' : '' }}>
                                            Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city"
                                        value="{{ $userdetails->city }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                                <div class="col-md-6">
                                    <input id="country" type="text" class="form-control" name="country"
                                        value="{{ $userdetails->country }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="linkedin" class="col-md-4 col-form-label text-md-right">Linkedin</label>
                                <div class="col-md-6">
                                    <input id="linkedin" type="text" class="form-control" name="linkedin"
                                        value="{{ $userdetails->linkedin }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="twitter" class="col-md-4 col-form-label text-md-right">Twitter</label>
                                <div class="col-md-6">
                                    <input id="twitter" type="text" class="form-control" name="twitter"
                                        value="{{ $userdetails->twitter }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="facebook" class="col-md-4 col-form-label text-md-right">Facebook</label>
                                <div class="col-md-6">
                                    <input id="facebook" type="text" class="form-control" name="facebook"
                                        value="{{ $userdetails->facebook }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="about" class="col-md-4 col-form-label text-md-right">About</label>
                                <div class="col-md-6">
                                    <textarea id="about" class="form-control" name="about" rows="4">{{ $userdetails->about }}</textarea>
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

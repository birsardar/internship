@extends('admin.layouts.main')
@section('content')
    <div class="content md-4 my-4 ml-4">
        <form action="{{ route('managers.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Form fields... -->

                <!-- First Name -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleInputFirstName" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="exampleInputFirstName"
                            aria-describedby="emailHelp" value="{{ $user->first_name ?? old('first_name') }}">
                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Last Name -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleInputLastName" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="exampleInputLastName"
                            aria-describedby="emailHelp" value="{{ $user->last_name ?? old('last_name') }}">
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- User Name -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" name="username" class="form-control" id="username"
                            aria-describedby="emailHelp" value="{{ $user->username ?? old('username') }}">
                        <!-- Display username validation error if exists -->
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Email Address -->
                <div class="col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ $user->email ?? old('email') }}">
                    <!-- Display email validation error if exists -->
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Image Upload -->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Image</label>
                    <input type="file" class="form-control" name="avatar" id="image">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Bootstrap Table</title>
</head>

<body>
    <div class="container mt-5">
        <h1>User Details</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Avatar</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">City</th>
                    <th scope="col">Country</th>
                    <th scope="col">About</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img src="{{ $user->avatar }}" alt="Avatar" width="100px" height="100px">
                    </td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $userDetails->gender }}</td>
                    <td>{{ $userDetails->phone_number }}</td>
                    <td>{{ $userDetails->city }}</td>
                    <td>{{ $userDetails->country }}</td>
                    <td>{{ $userDetails->about }}</td>
                </tr>
            </tbody>
        </table>
        <button class="btn btn-primary"><a href="{{ route('userdetail.edit', $userDetails->id) }}"
                class="btn btn-primary"> Edit </a></button>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

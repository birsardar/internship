@extends('admin.layouts.main')

@section('content')
    <div class="content-header">
        <!-- Header content... -->
    </div>
    <div id="successMessage">
        @if (session('success'))
            <div class="alert alert-success mt-4">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <button class="btn btn-primary" style="margin: 5px 0px 0px 25px; color= white;">
        <a href="{{ route('managers.create') }}" style="color: white; text-decoration: none;">
            ADD New
        </a>
    </button>
    <table class="table" style="margin-top: 50px; margin: 25px 25px 25px 25px;">
        <thead>
            <tr>
                <th scope="col">S.N</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">UserName</th>
                <th scope="col">Email</th>
                <th scope="col">Active</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $datas)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $datas->first_name }}</td>
                    <td>{{ $datas->last_name }}</td>
                    <td>{{ $datas->username }}</td>
                    <td>{{ $datas->email }}</td>
                    <td>
                        <a href="{{ route('managers.is_active', $datas->id) }}" data-placement="top"
                            title="{{ $datas->is_active == '1' ? 'Click to deactivate' : 'Click to activate' }}">
                            <i
                                class="nav-icon fas {{ $datas->is_active == '1' ? 'fa-check-circle' : 'fa-times-circle text-danger' }}"></i>
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-success"><a href="{{ route('managers.edit', $datas->id) }}"> Edit </a>
                        </button>
                        <form action="{{ route('managers.destroy', $datas->id) }}" class="d-inline-block"
                            data-placement="top" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-xs btn-outline-danger delete-manager-btn" type="submit">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 2000);
    </script>
@endpush

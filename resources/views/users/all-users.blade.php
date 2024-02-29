@extends('layouts.app')

@section('content')
    <div class = "container">
        <h2>All User List</h2>
        <a href = "{{ route('users.create') }}" class = "btn btn-primary mb-2">
            Create User
        </a>

        @if($users -> isEmpty())
            <p>No users found.</p>
        @else
            <table class = "table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user -> id }}</td>
                            <td>{{ $user -> name }}</td>
                            <td>{{ $user -> username }}</td>
                            <td>{{ $user -> role_id }}</td>
                            <td>{{ $user -> phone }}</td>
                            <td>{{ $user -> email }}</td>
                            <td>{{ $user -> address }}</td>
                            <td>{{ $user -> gender }}</td>
                            <td>{{ $user -> is_active }}</td>
                            <td>
                                <a href = "{{ route('users.show', $user -> id) }}" class = "btn btn-info btn-sm">
                                    View
                                </a> 
                                <a href = "{{ route('users.edit', $user -> id) }}" class = "btn btn-info btn-sm">
                                    Edit
                                </a>  
                                <form action = "{{ route('users.destroy', $user -> id) }}" method = "POST" style = "display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type = "submit" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure you want to delete this user?')">
                                        Delete
                                    </button>
                                </form> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
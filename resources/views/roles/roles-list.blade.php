@extends('layouts.app')

@section('content')
    <div class = "container">
        <h2>Role Management</h2>
        <a href = "{{ route('roles.create') }}" class = "btn btn-primary mb-3">
            Create Role
        </a>
        @if($roles->isEmpty())
            <p>No roles found.</p>
        @else
            <table class = "table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href = "{{ route('roles.show', $role->id) }}" class = "btn btn-info btn-sm">
                                    View
                                </a>
                                <a href = "{{ route('roles.edit', $role->id) }}" class = "btn btn-primary btn-sm">
                                    Edit
                                </a>
                                <form action = "{{ route('roles.destroy', $role->id) }}" method = "POST" style = "display: inline;">
                                    @csfr
                                    @method('DELETE')
                                    <button type = "submit" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure to delete this role?')">
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
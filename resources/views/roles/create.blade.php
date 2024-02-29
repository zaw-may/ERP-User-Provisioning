@extends('layouts.app')

@section('content')
    <div class = "container">
        <h2>Create New Role</h2>
        <form action = "{{ route('roles.store') }}" method = "POST">
            @csrf
            <div class = "mb-3">
                <label for = "uroleid">Role ID:</label>
                <input type = "text" name = "uroleid" class = "form-control" required>
            </div>
            <div class = "mb-3">
                <label for = "rolename">Name:</label>
                <input type = "text" name = "rolename" class = "form-control" required>
            </div>
            <button type = "submit" class = "btn btn-primary">Submit</button>
        </form>
    </div>
@endsection 
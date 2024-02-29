@extends('layouts.app')

@section('content')
    <div class = "container">
        <h2>Create New User</h2>
        <form action = "{{ route('users.store') }}" method = "POST">
            @csrf
            <div class = "mb-3">
                <label for = "userid">Id:</label>
                <input type = "text" name = "userid" class = "form-control" required>
            </div>
            <div class = "mb-3">
                <label for = "dname">Name:</label>
                <input type = "text" name = "dname" class = "form-control" required>
            </div>
            <div class = "mb-3">
                <label for = "username">Username:</label>
                <input type = "text" name = "username" class = "form-control" required>
            </div>
            <div class = "mb-3">
                <label for = "roleid">Role:</label>
                <input type = "text" name = "roleid" class = "form-control" required>
            </div>
            <div class = "mb-3">
                <label for = "phone">Phone:</label>
                <input type = "text" name = "phone" class = "form-control" required>
            </div>
            <div class = "mb-3">
                <label for = "email">Email:</label>
                <input type = "email" name = "email" class = "form-control" required>
            </div>
            <div class = "mb-3">
                <label for = "address">Address:</label>
                <textarea class = "form-control" name = "address"></textarea>
            </div>
            <div class = "mb-3">
                <label for = "gender">Gender:</label>
                <select name = "gender" class = "form-select">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Not Specified</option>
                </select>
            </div>
            <div class = "mb-3">
                <label for = "status">Status:</label>
                <select name = "status" class = "form-select">
                    <option>Active</option>
                    <option>Offline</option>
                    <option>Away</option>
                </select>
            </div>
            <div class = "mb-3">
                <label for = "password"Password:</label>
                <input type = "password" name = "password" class = "form-control" required>
            </div>
        </form>
    </div>
@endsection
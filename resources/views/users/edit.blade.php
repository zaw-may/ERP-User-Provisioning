@extends('layouts.app')

@section('content')
    <div class = "container">
        <h2>Edit User</h2>
        <div class = "row">
            <div class = "col-md-8 offset-md-2">
                <form method = "POST" action = "{{ route('users.edit', $user->id }}" class = "bg-white shadow-sm rounded p-4">
                    @method('PUT')
                    @csrf                     
                    <div class = "mb-3">
                        <label for = "name" class = "form-label">Name: </label>
                        <input type = "text" id = "name" name = "name" value = "{{ old('name', $user->name) }}" class = "form-control" required>
                        @error('name')
                            <div class = "text-danger">{{ $message }}</div>
                        @enderror 
                    </div>

                    <div class = "mb-3">
                        <label for = "username" class = "form-label">Username: </label>
                        <input type = "text" id = "username" name = "username" value = "{{ old('username', $user->username) }}" class = "form-control" required>
                        @error('username')
                            <div class = "text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class = "mb-3">
                        <button type = "submit" class = "btn btn-primary">Edit User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
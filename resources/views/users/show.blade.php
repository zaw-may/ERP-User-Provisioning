@extends('layouts.app')

@section('content')
    <div class = "container">
        <h2>User Information</h2>
        <div class = "card">
            <div class = "card-header">
                <h4>User Contact</h4>
            </div>
            <div class = "card-body">
                <h5 class = "card-title">{{ $user->name }}</h5>
                <p class = "card-text">Email: {{ $user->email }}</p>
                <p class = "card-text">Phone: {{ $user->phone }}</p>
                <p class = "card-text">Addres: {{ $user->address }}</p>
                <a href = "{{ route('users.all-users') }}" class = "btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
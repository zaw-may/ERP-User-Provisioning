@extends('layouts.app')

@section('content')
    <div class = "container">
        <h1>Welcome to the Dashboard</h1>
        <div class = "row">
            <div class = "col-md-6">
                <div class = "card">
                    <div class = "card-header">
                        Dashboard Section 1
                    </div>
                    <div class = "card-body">
                        <p>Dashboard Content</p>
                    </div>
                </div>
            </div>

            <div class = "col-md-6">
                <div class = "card">
                    <div class = "card-header">
                        Dashboard Section 2    
                    </div>
                    <div class = "card-body">
                        <p>Dashboard Content</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
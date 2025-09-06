@extends('layouts.welcome')
@section('welcome_page_content')
    <div class="e-handy-home-section ">
        <div class="container">
            <div class="row ">
                <div class="col-md-8 mx-auto  bg-white p-5">
                    <h1 class="text-center mt-3">Welcome to E-handy Hires</h1>
                    <p class="text-center">Register / Login Below</p>
                    <div class="mx-auto text-center">
                        <a class="btn btn-success" href="{{ route('register')}}">Register</a>
                        <a class="btn btn-primary" href="{{route('login')}}">login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
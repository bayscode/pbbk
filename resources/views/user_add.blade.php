@extends('layout')
@section('title')
    User Add
@endsection
@section('body')
    <div class="container">
        <h3 class="mt-3">Add User</h3>
        <div class="bg-light p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" style="color: #2B296C"
                            href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" style="color: #2B296C"
                            href="{{ url('user') }}">User Data</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
        </div>

        <div class="bodyAddUser text-center">
            <div class="addUser shadow">
                @if ($errors->any())
                    <div class="alert alert-danger p-1">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $v)
                                <li>{{ $v }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <main class="form-signin">

                    {{-- Alert --}}
                    @if (Session::has('message'))
                        <div class="alert alert-info">
                            <strong>Info<i class="bi-info-circle"></i></strong> {{ Session::get('message') }}
                        </div>
                    @endif
                    {{-- End Alert --}}

                    <form action="{{ url('add-user') }}" method="post">
                        @csrf
                        <h1 class="h4 mb-3 fw-bold" style="color: #2B296C">ADD USER</h1>

                        <div class="form-floating mb-2">
                            <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                id="name" placeholder="Input your full name ...">
                            <label for="text">Full Name</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input value="{{ old('email') }}" type="email" class="form-control" name="email"
                                id="email" placeholder="Input your email ..">
                            <label for="email">E-mail</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Input your password ..">
                            <label for="password">Password</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password_confirmation" placeholder="Input your password again ..">
                            <label for="password_confirmation">Password Confirmation</label>
                        </div>

                        <button class="w-100 myButton" type="submit">SAVE</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection

@extends('layout')
@section('title')
    Login
@endsection

@section('body')
    <div class="bodyLogin text-center imgLogin">

        <div class="object1">
            <img width="280" src="img/ObjLogin1.svg" alt="">
        </div>

        <div class="object2">
            <img width="100" src="img/ObjLogin2.svg" alt="">
        </div>

        <div class="object3">
            <img width="600" src="img/BgLogin2.svg" alt="">
        </div>

        <div class="login shadow">
            <main class="form-signin">
                <form action="{{ url('login') }}" method="POST">
                    @csrf
                    <img class="mb-4" src="{{ asset('img/iconLogin.svg') }}" alt="LogoBaysShop" width="72"
                        height="57">
                    <h1 class="h4 mb-3 fw-normal">Please sign in</h1>

                    <div class="form-floating mb-2">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" placeholder="Type your email...">
                        <label for="email">Email Address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-2">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="password" placeholder="Type your password ...">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="w-100 btn-lg btn-primary btn" type="submit">Sign in</button>
                    <p class="mt-4 mb-2 text-muted">&copy; BaysCode-2022</p>
                </form>
            </main>
        </div>
    </div>
@endsection

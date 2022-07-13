@extends('layout')
@section('title')
    Category Add
@endsection
@section('body')
    <div class="container">
        <h3 class="mt-3">Add Category</h3>
        <div class="bg-light p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none text-primary" href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none text-primary" href="{{ url('category') }}">Category
                            Data</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
        </div>

        <div class="bodyAddCategory text-center">
            <div class="addUser shadow">
                @if ($errors->any())
                    <div class="alert alert-danger p-1">
                        <dl class="mb-0" style="list-style: none">
                            @foreach ($errors->all() as $v)
                                <dd><i class="bi bi-exclamation-circle"></i> {{ $v }}</dd>
                            @endforeach
                        </dl>
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

                    <form action="{{ url('add-category') }}" method="post">
                        @csrf
                        <h1 class="h4 mb-3 fw-bold text-primary">ADD CATEGORY</h1>

                        <div class="form-floating mb-2">
                            <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                id="name" placeholder="Input your full name ...">
                            <label for="text">Name</label>
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit">
                            SAVE
                        </button>
                        <button class="btn btn-success btn-sm" type="reset">
                            RESET
                        </button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection

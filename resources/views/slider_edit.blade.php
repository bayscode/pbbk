@extends('layout')
@section('title')
    Slider Edit
@endsection
@section('body')
    <div class="container">
        <h3 class="mt-3">Edit Slider</h3>
        <div class="bg-light p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none text-primary" href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a class="text-decoration-none text-primary" href="{{ url('slider') }}">Slider
                            Data</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>

        <div class="bodyAddUser text-center mt-3 mb-3">
            <div class="addUser shadow">
                <main class="form-signin">
                    @if ($errors->any())
                        <div class="alert alert-danger p-1">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $v)
                                    <li>{{ $v }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Alert --}}
                    @if (Session::has('message'))
                        <div class="alert alert-info">
                            <strong><i class='bx bx-happy-heart-eyes'></i></strong> {{ Session::get('message') }}
                        </div>
                    @endif
                    {{-- End Alert --}}

                    <form action="{{ url('edit-slider') }}/{{ $slider->id }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <h1 class="h4 mb-3 fw-bold text-primary">EDIT SLIDER</h1>
                        <div class="form-floating mb-2">
                            <input value="{{ old('name') ? old('name') : $slider->name }}" type="text" name="name"
                                id="name" class="form-control" placeholder="Type slider name ...">
                            <label for="text">Nama</label>
                        </div>

                        <div class="input-group mb-2">
                            <img src="{{ asset('sliders/' . $slider->photo) }}" class="w-25 img-thumbnail">
                        </div>

                        <div class="input-group mb-2">
                            <input type="file" name="photo" id="photo" class="form-control">
                        </div>

                        <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
                        <button class="btn btn-success btn-sm" type="reset">RESET <i class="bi bi-reset"></i></button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection

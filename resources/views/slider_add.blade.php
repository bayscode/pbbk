@extends('layout')
@section('title')
    Slider Add
@endsection
@section('body')
    <div class="container">
        <h3 class="mt-3">Add Slider</h3>
        <div class="bg-light p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" style="color: #2B296C" href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" style="color: #2B296C"
                            href="{{ url('slider') }}">Slider Data</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
        </div>

        <div class="bodyAddSlider text-center">
            <div class="addUserProduct shadow">
                @if ($errors->any())
                    <div class="alert alert-danger p-1">
                        <dl class="mb-0" style="list-style: none">
                            @foreach ($errors->all() as $v)
                                <dd><i class='bx bx-tired'></i> {{ $v }}</dd>
                            @endforeach
                        </dl>
                    </div>
                @endif

                <main class="form-signin">
                    {{-- Alert --}}
                    @if (Session::has('message'))
                        <div class="alert alert-info">
                            <strong>Info <i class='bx bx-happy-heart-eyes'></i></strong> {{ Session::get('message') }}
                        </div>
                    @endif
                    {{-- End Alert --}}

                    <form action="{{ url('add-slider') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h1 class="h4 mb-3 fw-bold" style="color: #2B296C">ADD SLIDER</h1>

                        <div class="form-floating mb-2">
                            <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                id="name" placeholder="Nama">
                            <label for="text">Nama</label>
                        </div>

                        <div class="input-group">
                            <input type="file" class="form-control form-control-sm" name="photo" id="photo">
                        </div>
                        <button class="btn btnBD btn-sm mt-3" type="submit">
                            SAVE
                        </button>
                        <button class="btn btnPK btn-sm mt-3" type="reset">
                            RESET
                        </button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection

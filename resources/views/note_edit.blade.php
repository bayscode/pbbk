@extends('layout')
@section('title')
    Note Edit
@endsection
@section('body')
    <div class="container">
        <h3 class="mt-3">Edit Note</h3>
        <div class="bg-light p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" style="color: #2B296C"
                            href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" style="color: #2B296C"
                            href="{{ url('note') }}">Note
                            Data</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>

        <div class="bodyAddUser text-center">
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
                            <strong>Info<i class="bi-info-circle"></i></strong> {{ Session::get('message') }}
                        </div>
                    @endif
                    {{-- End Alert --}}

                    <form action="{{ url('edit-note') }}/{{ $note->id }}" method="post">
                        @csrf
                        <h1 class="h4 mb-3 fw-bold" style="color: #2B296C">EDIT NOTE</h1>

                        <div class="form-floating mb-2">
                            <select class="form-select" name="status" id="status">
                                <option selected>Choose Status</option>
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                            <label for="status">Choose Status</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input value="{{ old('description') ? old('description') : $note->description }}" type="text"
                                name="description" id="description" class="form-control"
                                placeholder="Type product name ...">
                            <label for="text">Note</label>
                        </div>


                        <button class="btn btn-sm btnBD" type="submit">SAVE</i></button>
                        <button class="btn btn-sm btnPK" type="reset">RESET</i></button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection

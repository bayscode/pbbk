@extends('layout')
@section('title')
    Note Add
@endsection
@section('body')
    <div class="container">
        <h3 class="mt-3">Add Note</h3>
        <div class="bg-light p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" style="color: #2B296C"
                            href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" style="color: #2B296C"
                            href="{{ url('note') }}">Note
                            Data</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
        </div>

        <div class="bodyAddCategory text-center">
            <div class="addCategory shadow">
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
                    <form action="{{ url('add-note') }}" method="post">
                        @csrf
                        <h1 class="h4 mb-3 fw-bold" style="color: #2B296C">ADD NOTE</h1>

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
                            <input value="{{ old('description') }}" type="text" class="form-control" name="description"
                                id="description" placeholder="Input your full description ...">
                            <label for="text">Note</label>
                        </div>

                        <button class="btn btn-sm btnBD" type="submit">
                            SAVE
                        </button>
                        <button class="btn btn-sm btnPK" type="reset">
                            RESET
                        </button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection

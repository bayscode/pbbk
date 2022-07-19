@extends('layout')
@section('title')
    Category Management
@endsection
@section('body')
    <div class="container">
        <h3 class="mt-3">Category Management</h3>
        <div class="bg-light p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" style="color: #2B296C"
                            href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category Data</li>
                </ol>
            </nav>
        </div>
        <div class="card shadow-sm mt-5">
            <div class="d-flex p-2">
                <div class="w-100">
                    <div class="fw-bold h5 p-2" style="color: #2B296C">CATEGORY DATA</div>
                </div>
                <div class="w-100 text-end">
                    <a href="{{ url('add-category') }}" class="btn btnBD text-decoration-none">
                        <i class="bi bi-plus"></i> Category
                    </a>
                </div>
            </div>

            <div class="card-body">
                {{-- Alert --}}
                @if (Session::has('message'))
                    <div class="alert alert-info">
                        <strong>Info<i class="bi-info-circle"></i></strong> {{ Session::get('message') }}
                    </div>
                @endif
                {{-- End Alert --}}

                {{-- Table --}}
                <table class="table align-middle table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th width="10%">NO</th>
                            <th>NAMA</th>
                            <th width="20%">ACT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->name }}</td>
                                <td>
                                    <a href="{{ url('edit-category') }}/{{ $v->id }}"
                                        class="btn btn-warning btn-sm text-decoration-none text-white">
                                        <i class='bx bx-edit bx-xs'></i> EDIT
                                    </a>
                                    <a href="{{ route('delete-category', ['id' => $v->id]) }}"
                                        onclick="return confirm('Are u sure?')"
                                        class="btn btn-danger text-decoration-none btn-sm text-white">
                                        <i class='bx bx-trash'></i> DELETE
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- End Table --}}
            </div>
        </div>
    </div>
@endsection

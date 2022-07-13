@extends('layout')
@section('title')
    User Management
@endsection
@section('body')
    <div class="container font-iqbal">
        <h3 class="mt-3">User Management</h3>
        <div class="bg-light p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-decoration-none" href="{{ url('home') }}">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        User Data
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card shadow-sm mt-5">
            <div class="d-flex p-2">
                <div class="w-100">
                    <div class="fw-bold h5 text-primary p-2">USER DATA</div>
                </div>
                <div class="w-100 text-end">
                    <a href="{{ url('add-user') }}" class="btn btn-primary text-decoration-none">
                        <i class="bi bi-person-plus"></i> User
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
                <table class="table align-middle table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>E-MAIL</th>
                            <th>ACT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->name }}</td>
                                <td>{{ $v->email }}</td>
                                <td>
                                    <a href="{{ url('edit-user') }}/{{ $v->id }}"
                                        class="btn btn-warning text-white text-decoration-none btn-sm">
                                        <i class='bx bx-edit bx-xs'></i> EDIT
                                    </a>
                                    <a href="{{ route('delete-user', ['id' => $v->id]) }}"
                                        onclick="return confirm('Are u sure?')"
                                        class="btn btn-danger text-decoration-none btn-sm">
                                        <i class='bx bx-trash'></i> DELETE
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

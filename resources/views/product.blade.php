@extends('layout')
@section('title')
    Product Management
@endsection

@section('body')
    <div class="container">
        <div class="container">
            <h3 class="mt-3">Product Management</h3>
            <div class="bg-light p-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a class="text-decoration-none text-primary" href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Data</li>
                    </ol>
                </nav>
            </div>

            <div class="card mt-5 mb-5 shadow-sm">
                    <div class="d-flex p-2">
                        <div class="w-100">
                            <div class="fw-bold h5 text-primary p-2">PRODUCT DATA</div>
                        </div>
                        <div class="w-100 text-end">
                            <a href="{{ url('add-product') }}" class="btn btn-primary text-decoration-none">
                                <i class="bi bi-plus"></i> Product
                            </a>
                        </div>
                    </div>
                {{-- </div> --}}

                <div class="card-body">
                    {{-- Alert --}}
                    @if (Session::has('message'))
                        <div class="alert alert-info">
                            <strong>Info <i class="bi-info-circle"></i></strong> {{ Session::get('message') }}
                        </div>
                    @endif
                    {{-- End Alert --}}

                    <table class="table table-hover align-middle" id="myTable">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>DETAIL PRODUCT</th>
                                <th>CATEGORY</th>
                                <th>DESCRIPTION</th>
                                <th>PRICE</th>
                                <th>STOCK</th>
                                <th>PHOTO</th>
                                <th>ACT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $v)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $v->name }}</td>
                                    <td>{{ $v->ctgr->name }}</td>
                                    <td>{{ $v->description }}</td>
                                    <td>Rp {{ $v->price }}</td>
                                    <td>{{ $v->stock }}</td>
                                    <td>
                                        <img width="50" class="img-thumbnail" src="/images/{{ $v->photo }}"
                                            alt="Product" title="{{ $v->description }}">
                                    </td>
                                    <td>
                                        <a href="{{ url('edit-product') }}/{{ $v->id }}"
                                            class="btn btn-warning btn-sm text-white text-decoration-none">
                                            <i class='bx bx-edit bx-xs'></i> EDIT
                                        </a>
                                        <a href="{{ route('delete-product', ['id' => $v->id]) }}"
                                            onclick="return confirm('Are u sure?')" class="btn btn-danger btn-sm text-decoration-none">
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
    </div>
@endsection

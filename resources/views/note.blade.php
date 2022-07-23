@extends('layout')
@section('title')
    Note Management
@endsection
@section('body')
    <div class="container">
        <h3 class="mt-3">Note Management</h3>
        <div class="bg-light p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" style="color: #2B296C"
                            href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Note Data</li>
                </ol>
            </nav>
        </div>
        <div class="card shadow-sm mt-5">
            <div class="d-flex p-2">
                <div class="w-100">
                    <div class="fw-bold h5 p-2" style="color: #2B296C">NOTE DATA</div>
                </div>
                <div class="w-100 text-end">
                    <a href="{{ url('add-note') }}" class="btn btnBD text-decoration-none">
                        <i class="bi bi-plus"></i> NOTE
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
                            <th>TANGGAL</th>
                            <th>STATUS</th>
                            <th>NOTE</th>
                            <th width="20%">ACT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($note as $n)
                            <tr>
                                <td>{{ $n->created_at }}</td>
                                <td>
                                    @if ($n->status == 'high')
                                        <span class="badge text-bg-danger">{{ $n->status }}</span>
                                    @elseif ($n->status == 'medium')
                                        <span class="badge text-bg-warning text-white">{{ $n->status }}</span>
                                    @else
                                        <span class="badge text-bg-info text-white">{{ $n->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $n->description }}</td>
                                <td>
                                    <a href="{{ url('edit-note') }}/{{ $n->id }}"
                                        class="btn btn-warning btn-sm text-white text-decoration-none">
                                        <i class='bx bx-edit bx-xs'></i> EDIT
                                    </a>
                                    <a href="{{ route('delete-note', ['id' => $n->id]) }}"
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

@extends('layout')
@section('title')
    Catalog
@endsection
@section('body')
    <div class="container">
        <h3 class="mt-3">Catalog</h3>
        <div class="bg-light p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Catalog</li>
                </ol>
            </nav>
        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Category
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="{{ url('catalog') }}?search={{ $search }}"
                                class="list-group-item list-group-item-action 
                                @if (empty($category_id)) active @endif"
                                aria-current="true">
                                <i class="bi bi-caret-right"></i> All
                            </a>
                            @foreach ($category as $item)
                                <a href="{{ url('catalog') }}?category={{ $item->id }}&search={{ $search }}"
                                    class="list-group-item list-group-item-action 
                                    @if ($item->id == $category_id) active @endif"
                                    aria-current="true">
                                    <i class="bi bi-caret-right"></i> {{ $item->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <form action="{{ url('catalog') }}" method="get">
                    <input type="hidden" name="category" value="{{ $category_id }}">
                    <div class="row">
                        <div class="col-md-10">
                            <input value="{{ $search }}" type="text" name="search" placeholder="Search ..."
                                class="form-control">
                        </div>

                        <div class="col-md-1">
                            <button class="btn btn-primary w-100">
                                <i class="bi-search"></i>
                            </button>
                        </div>

                        <div class="col-md-1">
                            <a href="{{ url('catalog') }}?category={{ $category_id }}" class="btn btn-warning w-100">
                                <i class="bi-x"></i>
                            </a>
                        </div>
                    </div>
                </form>

                <div class="row mt-2">
                    @foreach ($product as $item)
                        <div class="col-md-3">
                            <div class="card mt-2 mb-3">
                                <img src="{{ asset('images') }}/{{ $item->photo }}" class="card-img-top">
                                <div class="card-body">
                                    {{-- <h5 class="card-title" style="height: 50px"> --}}
                                    <div class="h5 card-title" style="height: 30px">

                                        @if (strlen($item->name) >= 30)
                                            {{ substr($item->name, 0, 30) }}...
                                        @else
                                            {{ $item->name }}
                                        @endif
                                    </div>
                                    {{-- </h5> --}}
                                    <p class="card-text">
                                    <div>
                                        <strong>Rp.{{ $item->price }}</strong>
                                    </div>
                                    {{-- {{ $item->description }} --}}
                                    <small class="text-primary">Stock {{ $item->stock }}</small>
                                    </p>
                                    <a href="https://api.whatsapp.com/send?phone=+628985995280&text=Punten admin,%20saya%20mau%20beli%20produk%20{{ urlencode($item->name) }}%20bisa%20dibantu?"
                                        target="blank" class="btn btn-primary text-decoration-none w-100">
                                        <i class="bi bi-cart"></i> BUY
                                    </a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning text-white w-100 mt-1 mb-1"
                                        data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}">
                                        <i class="bi-list"></i> Detail
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ $item->description }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-2 mb-2">
                    {{ $product->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

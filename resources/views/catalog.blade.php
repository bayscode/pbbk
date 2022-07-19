@extends('layout')
@section('title')
    Catalog
@endsection
@section('body')
    <div class="container">
        <h3 class="mt-2">Catalog</h3>
        <div class="bg-light p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Catalog</li>
                </ol>
            </nav>
        </div>

        <div class="row mt-2">
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
                            <a href="{{ url('catalog') }}?category={{ $category_id }}" class="btn w-100 text-white" style="background-color: #2B296C">
                                <i class="bi-x"></i>
                            </a>
                        </div>
                    </div>
                </form>

                <div class="row mt-2">
                    @foreach ($product as $item)
                        <div class="col-md-3">
                            <div class="card mt-2 ">
                                <div class="position-relative">
                                    <img src="{{ asset('images') }}/{{ $item->photo }}" class="card-img-top">
                                    <div>
                                        <small class="position-absolute top-0 badge border border-light p-2"
                                            style="background-color: #30317C">
                                            {{ $item->ctgr->name }}
                                        </small>
                                        
                                        <small
                                            class="position-absolute bottom-0 end-0 badge border border-light bg-primary p-2 text-white btn"
                                            data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}">Detail
                                        </small>
                                     </div>
                                </div>
                                <div class="card-body">
                                    <div class="h6 card-title" style="height: 24px">
                                        @if (strlen($item->name) >= 30)
                                            {{ substr($item->name, 0, 30) }}...
                                        @else
                                            {{ $item->name }}
                                        @endif
                                    </div>
                                    <p class="card-text">
                                    <div class="fw-bold">
                                        Rp.{{ $item->price }}
                                    </div>
                                    <small style="color: #D063E1">Stock {{ $item->stock }}</small>
                                    </p>
                                    <a href="https://api.whatsapp.com/send?phone=+628985995280&text=Punten admin,%20saya%20mau%20beli%20produk%20{{ urlencode($item->name) }}%20bisa%20dibantu?"
                                        target="blank" class="myButton text-center w-100">
                                        <i class="bi bi-cart"></i> BUY
                                    </a>

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
                                                    <button type="button" class="myButton">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-2 mb-5">
                    {{ $product->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

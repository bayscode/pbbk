@extends('layout')
@section('title')
    Home
@endsection
@section('body')
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            @foreach ($slider as $k => $v)
                <button type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="{{ $k }}"class="active" aria-current="true"
                    aria-label="Slide {{ $k }}">
                </button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($slider as $k => $v)
                <div class="carousel-item @if ($k == '0') active @endif">
                    <img src="{{ asset('sliders') }}/{{ $v->photo }}" class="d-block w-100" alt="...">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#3C6EFD" fill-opacity="1"
            d="M0,96L48,122.7C96,149,192,203,288,234.7C384,267,480,277,576,266.7C672,256,768,224,864,202.7C960,181,1056,171,1152,192C1248,213,1344,267,1392,293.3L1440,320L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
        </path>
    </svg>

    <div class="container mt-4">
        <div class="alert alert-secondary text-center">
            <h4 class="mb-0"><strong>Our Product</strong></h4>
        </div>
        <div class="row mt-2">
            @foreach ($product as $item)
                <div class="col-md-3">
                    <div class="card mt-2 mb-3">
                        <img src="{{ asset('images') }}/{{ $item->photo }}" class="card-img-top">
                        <div class="card-body">
                            <div class="h5 card-title" style="height: 30px">
                                @if (strlen($item->name) >= 30)
                                    {{ substr($item->name, 0, 30) }}...
                                @else
                                    {{ $item->name }}
                                @endif
                            </div>
                            <p class="card-text">
                            <div>
                                <strong>Rp.{{ $item->price }}</strong>
                            </div>
                            <small class="text-primary">Stock {{ $item->stock }}</small>
                            </p>
                            <a href="https://api.whatsapp.com/send?phone=+628985995280&text=Punten admin,%20saya%20mau%20beli%20produk%20{{ urlencode($item->name) }}%20bisa%20dibantu?"
                                target="blank" class="btn btn-primary text-decoration-none w-100">
                                <i class="bi bi-cart"></i> BUY
                            </a>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning text-white w-100 mt-1 mb-1" data-bs-toggle="modal"
                                data-bs-target="#modal{{ $item->id }}">
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
    </div>
@endsection

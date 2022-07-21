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
        <path fill="#2b2c7e" fill-opacity="1"
            d="M0,0L16,32C32,64,64,128,96,133.3C128,139,160,85,192,53.3C224,21,256,11,288,42.7C320,75,352,149,384,149.3C416,149,448,75,480,69.3C512,64,544,128,576,128C608,128,640,64,672,58.7C704,53,736,107,768,117.3C800,128,832,96,864,80C896,64,928,64,960,85.3C992,107,1024,149,1056,165.3C1088,181,1120,171,1152,186.7C1184,203,1216,245,1248,229.3C1280,213,1312,139,1344,128C1376,117,1408,171,1424,197.3L1440,224L1440,0L1424,0C1408,0,1376,0,1344,0C1312,0,1280,0,1248,0C1216,0,1184,0,1152,0C1120,0,1088,0,1056,0C1024,0,992,0,960,0C928,0,896,0,864,0C832,0,800,0,768,0C736,0,704,0,672,0C640,0,608,0,576,0C544,0,512,0,480,0C448,0,416,0,384,0C352,0,320,0,288,0C256,0,224,0,192,0C160,0,128,0,96,0C64,0,32,0,16,0L0,0Z">
        </path>
    </svg>

    <div class="container mt-4 mb-5">
        <div class="p-3 shadow text-center">
            <h4 class="mb-0"><strong style="color: #2B29B3">Our Product</strong></h4>
        </div>
        <div class="row mt-2">
            @foreach ($product as $item)
                <div class="col-md-3">
                    <div class="card mt-2 mb-3">
                        <div class="position-relative">
                            <img src="{{ asset('images') }}/{{ $item->photo }}" class="card-img-top">
                            <div>
                                <small class="position-absolute top-0 start-0 badge border border-light p-2"
                                    style="background-color: #30317C">
                                    {{ $item->ctgr->name }}
                                </small>

                                <small
                                    class="position-absolute top-0 end-0 badge rounded-circle border-light border p-2 bg-danger">
                                    <div title="Stock {{ $item->stock }}">
                                        x{{ $item->stock }}
                                    </div>
                                </small>

                                <small
                                    class="position-absolute bottom-0 end-0 badge border border-light bg-primary p-2 text-white btn"
                                    data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}">Detail
                                </small>
                            </div>
                        </div>
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
                            </p>
                            </p>
                            <a href="https://api.whatsapp.com/send?phone=+628985995280&text=Punten admin,%20saya%20mau%20beli%20produk%20{{ urlencode($item->name) }}%20bisa%20dibantu?"
                                target="blank" class="myButton text-center w-100">
                                <i class="bi bi-cart"></i> BUY
                            </a>

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
                                            <button type="button" class="myButtonClose"
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


    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#2B2C7E" fill-opacity="1"
            d="M0,128L30,117.3C60,107,120,85,180,96C240,107,300,149,360,176C420,203,480,213,540,213.3C600,213,660,203,720,197.3C780,192,840,192,900,208C960,224,1020,256,1080,245.3C1140,235,1200,181,1260,154.7C1320,128,1380,128,1410,128L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
        </path>
    </svg>
@endsection

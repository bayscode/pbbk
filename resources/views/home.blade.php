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
        <path fill="#30317C" fill-opacity="1"
            d="M0,64L15,69.3C30,75,60,85,90,106.7C120,128,150,160,180,165.3C210,171,240,149,270,149.3C300,149,330,171,360,160C390,149,420,107,450,122.7C480,139,510,213,540,240C570,267,600,245,630,229.3C660,213,690,203,720,176C750,149,780,107,810,122.7C840,139,870,213,900,234.7C930,256,960,224,990,186.7C1020,149,1050,107,1080,112C1110,117,1140,171,1170,208C1200,245,1230,267,1260,266.7C1290,267,1320,245,1350,234.7C1380,224,1410,224,1425,224L1440,224L1440,0L1425,0C1410,0,1380,0,1350,0C1320,0,1290,0,1260,0C1230,0,1200,0,1170,0C1140,0,1110,0,1080,0C1050,0,1020,0,990,0C960,0,930,0,900,0C870,0,840,0,810,0C780,0,750,0,720,0C690,0,660,0,630,0C600,0,570,0,540,0C510,0,480,0,450,0C420,0,390,0,360,0C330,0,300,0,270,0C240,0,210,0,180,0C150,0,120,0,90,0C60,0,30,0,15,0L0,0Z">
        </path>
    </svg>

    <div class="container mt-4 mb-5">
        <div class="alert alert-secondary text-center">
            <h4 class="mb-0"><strong>Our Product</strong></h4>
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
                            <small style="color: #D063E1">Stock {{ $item->stock }}</small>
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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#30317C" fill-opacity="1"
            d="M0,288L26.7,293.3C53.3,299,107,309,160,304C213.3,299,267,277,320,261.3C373.3,245,427,235,480,229.3C533.3,224,587,224,640,229.3C693.3,235,747,245,800,250.7C853.3,256,907,256,960,229.3C1013.3,203,1067,149,1120,160C1173.3,171,1227,245,1280,240C1333.3,235,1387,149,1413,106.7L1440,64L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z">
        </path>
    </svg>
@endsection

@extends('layout')
@section('title')
    Product Add
@endsection
@section('body')
    <div class="container">
        <h3 class="mt-3">Add Product</h3>
        <div class="bg-light p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none" style="color: #2B296C"
                            href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" style="color: #2B296C"
                            href="{{ url('product') }}">Product Data</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
        </div>

        <div class="bodyAddProduct text-center mb-2">
            <div class="addUserProduct shadow">
                @if ($errors->any())
                    <div class="alert alert-danger p-1">
                        <dl class="mb-0" style="list-style: none">
                            @foreach ($errors->all() as $v)
                                <dd><i class='bx bx-tired'></i> {{ $v }}</dd>
                            @endforeach
                        </dl>
                    </div>
                @endif

                <main class="form-signin">
                    {{-- Alert --}}
                    @if (Session::has('message'))
                        <div class="alert alert-info">
                            <strong>Info <i class='bx bx-happy-heart-eyes'></i></strong> {{ Session::get('message') }}
                        </div>
                    @endif
                    {{-- End Alert --}}

                    <form action="{{ url('add-product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h1 class="h4 mb-3 fw-bold" style="color: #2B296C">ADD PRODUCT</h1>

                        <div class="form-floating mb-2">
                            <select class="form-select" name="category" id="category">
                                <option selected>-</option>
                                @foreach ($category as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                            <label for="category">Category</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                id="name" placeholder="Input your full name ...">
                            <label for="text">Merk</label>
                        </div>

                        <div class="form-floating mb-2">
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                                placeholder="Type description">{{ old('description') }}</textarea>
                            <label for="description">Detail Product</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input value="{{ old('price') }}" type="text" class="form-control" name="price"
                                id="price" placeholder="Price">
                            <label for="text">Price</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input value="{{ old('stock') }}" type="text" class="form-control" name="stock"
                                id="stock" placeholder="Stock">
                            <label for="text">Stock</label>
                        </div>
                        <div class="input-group">
                            <input type="file" class="form-control form-control-sm" name="photo" id="photo">
                        </div>
                        <button class="btn btnBD btn-sm mt-3" type="submit">
                            SAVE
                        </button>
                        <button class="btn btnPK btn-sm mt-3" type="reset">
                            RESET
                        </button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection

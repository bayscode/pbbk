@extends('layout')
@section('title')
    Product Edit
@endsection
@section('body')
    <div class="container">
        <h3 class="mt-3">Edit Product</h3>
        <div class="bg-light p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none text-primary"
                            href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a class="text-decoration-none text-primary"
                            href="{{ url('product') }}">Product Data</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>

        <div class="bodyEditCategory text-center mt-5 mb-5">
            <div class="editProduct shadow">
                <main class="form-signinProduct">
                    @if ($errors->any())
                        <div class="alert alert-danger p-1">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $v)
                                    <li>{{ $v }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Alert --}}
                    @if (Session::has('message'))
                        <div class="alert alert-info">
                            <strong><i class='bx bx-happy-heart-eyes'></i></strong> {{ Session::get('message') }}
                        </div>
                    @endif
                    {{-- End Alert --}}

                    
                    <div class="row">
                        <form action="{{ url('edit-product') }}/{{ $product->id }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <h1 class="h4 mb-3 fw-bold text-primary">EDIT PRODUCT</h1>
                            </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <select name="category" id="category" class="form-control">
                                    <option value="">Choose</option>
                                    @foreach ($data as $v)
                                        <option value="{{ $v->id }}"
                                            @if ((old('category') ? old('category') : $product->category_id) == $v->id) selected @endif>
                                            {{ $v->name }}</option>
                                    @endforeach
                                </select>
                                <label for="category">Category</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <input value="{{ old('name') ? old('name') : $product->name }}" type="text"
                                    name="name" id="name" class="form-control" placeholder="Type product name ...">
                                <label for="text">Merk</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <input value="{{ old('stock') ? old('stock') : $product->stock }}" type="text"
                                    name="stock" id="stock" class="form-control" placeholder="Type stock ...">
                                <label for="text">Stock</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <input value="{{ old('price') ? old('price') : $product->price }}" type="text"
                                    name="price" id="price" class="form-control" placeholder="Type price ...">
                                <label for="text">Price</label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <col-md-12>
                            <div class="form-floating mb-2">
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                                    placeholder="Type description">{{ old('description') ? old('description') : $product->description }}</textarea>
                                <label for="description">Description</label>
                            </div>
                        </col-md-12>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-2">
                                <img src="{{ asset('images/' . $product->photo) }}" class="w-25 img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-2">
                                <input type="file" name="photo" id="photo" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
                    <button class="btn btn-success btn-sm" type="reset">RESET</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection

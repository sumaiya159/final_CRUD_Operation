@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-end p-4">
            <a href="{{ route('products.index') }}" class="btn fs-5 " style=" color:rgb(28, 25, 25) ;background-color: rgb(245, 182, 11)">Back</a>
        </div>

        <div class="card text-dark bg-warning">
            <div class="card-header">
                <div class="card-header fs-4 fw-bold ">Add New Product</div>
            </div>

            <div class="card-body">
                <form method="post"  action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="mb-3 row">
                        <label for="name" class=" fw-bold col-md-4 col-form-label text-end">
                            Name :
                        </label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" placeholder="Enter product name " required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="category_id" class=" fw-bold col-md-4 col-form-label text-end">
                            Category :
                       </label>
                       <div class="col-md-6">
                        <select class="form-control" name="category_id" value="{{ old('category_id') }}" required autocomplete="category_id" autofocus >
                            <option selected>Select a Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>








                    <div class="row p-3">
                        <label for="description" class="col-md-2 col-form-label">Description</label>
                        <div class="col-md-10">
                            <textarea type="text" id="description" class="form-control" value="{{ old('description') }}" name="description"
                                placeholder="Enter Product Details"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="price" class="col-md-2 col-form-label">Price</label>
                        <div class="col-md-6">
                            <input type="number" id="price" class="form-control" value="{{ old('price') }}"
                                name="price" placeholder="Enter Product price">
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="is_active" class=" fw-bold col-md-4 col-form-label text-end">
                            Active Status :
                        </label>
                        <div class="col-md-6">
                            <select class="form-control" name="is_active" value="{{ old('is_active') }}" required autocomplete="is_active" autofocus >
                                <option selected>Select Active Status</option>
                                <option value='1'>Active</option>
                                <option value='0'>Deactive</option>
                            </select>
                            @error('is_active')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                             @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-md-2 col-form-label">Image</label>
                        <div class="col-md-6">
                            <input type="file" id="image" class="form-control" value="{{ old('image') }}"
                                name="image">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="rounded" style=" color:rgb(245, 240, 240) ;background-color: rgb(23, 24, 20)">Add Product</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('content')

 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="p-2 text-end">
                <a href="{{ route('products.index') }}" class="btn" style=" color:rgb(28, 25, 25) ;background-color: rgb(245, 182, 11)">Back</a>
            </div>

            <div class="card rounded-3 text-dark bg-warning fs-5 fw-semibold">
                <div class="card-header fw-bold">Product details</div>
                <div class="card-body">

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-end">
                        Name :
                        </label>
                        <div class="col-md-6">
                            <strong>{{ $product->name }}</strong>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="category" class=" ms-3 col-md-4 col-form-label text-end">
                            {{ __('Category') }} :
                        </label>

                        <div class="col-md-6">
                            <strong>{{ $product->category->name }}</strong>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-end">
                            Price :
                        </label>
                        <div class="col-md-6">
                            <strong>{{ $product->price }}</strong>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-end">
                            Description :
                            </label>
                        <div class="col-md-6">
                            <strong>{{ $product->description }}</strong>
                        </div>
                    </div>
                    <div class="row mb-3">
                            <lable class="col-md-4 col-form-label text-end">Image :</lable>
                            <div class="col-md-8">
                                @if ($product->image)
                                @if (file_exists(public_path('uploads/products/' .$product->image)))
                                    <img src="{{ asset('uploads/products/' .$product->image) }}"
                                height="25" width="40">

                                @else
                                <small>Image not exists in path</small>
                                @endif
                            @else
                                <small>No Image</small>
                            @endif

                            </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="is_active" class="col-md-4 ms-5 col-form-label text-end">
                            Active Status :
                        </label>
                        <div class="col-md-6">
                            @if ($product->is_active===1)
                            <strong>Active</strong>
                            @else
                            <strong>Inactive</strong>
                            @endif
                        </div>
                    </div>
                 </div>
             </div>
        </div>
    </div>
 </div>
  @endsection

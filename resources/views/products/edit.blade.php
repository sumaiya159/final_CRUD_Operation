@extends('layouts.app')
@section('content')

 <div class="container">
    <div class="justify-content-center row">
        <div class="col-md-8">
            <div class="p-4 text-end">
                <a href="{{ route('products.index') }}" class="btn" style=" color:rgb(28, 25, 25) ;background-color: rgb(245, 182, 11)">Back</a>
            </div>

            <div class="card card rounded-3 text-dark bg-warning fs-5 fw-semibold">
                <div class="card-header">
                    <div class="card-header fw-bold">Edit Product</div>
                </div>

                <div class="card-body">
                    <form  method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                         @csrf
                         @method('PATCH')
                         <div class=" row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-end">
                                {{ __('Name') }} :
                            </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                         </div>


                        <div class="mb-4 row">
                            <label for="category_name" class="col-md-4 col-form-label text-end">
                                {{ __('Category Name') }} :
                           </label>
                           <div class="col-md-6">
                                <select class="form-control" name="category_id" required>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($category->id == $product->category_id) selected @endif >
                                        {{ $category->name }}</option>
                                    @endforeach
                                </select>

                              @error('category_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                           </div>
                        </div>
                        <div class="row mb-3 ">
                            <label for="price" class="col-md-4 col-form-label text-end">Price</label>
                            <div class="col-md-6">
                                <input type="number" id="price" class="form-control " value="{{ $product->price }}"
                                    name="price" placeholder="Enter Product price">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="image" class="col-md-4 col-form-label text-end">Image</label>
                            <div class="col-md-6">
                                <input type="file" id="image" class="form-control" value="{{ old('image') }}"
                                    name="image">
                            </div>
                            <div class="col-md-2">
                                @if ($product->image)
                                    @if (file_exists(public_path('uploads/products/' .$product->image)))
                                        <img src="{{ asset('uploads/products/' . $product->image) }}"
                                    height="25" width="40">

                                    @else
                                    <small>Image not exists in path</small>
                                    @endif
                                @else
                                    <small>No Image</small>
                                @endif
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-end">Description</label>
                            <div class="col-md-6">
                                <textarea type="text" id="description" class="form-control" name="description"
                                    placeholder="Enter Product Details">{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                          <label for="is_active" class="col-md-4 col-form-label text-end">
                            {{ __('Active Status') }} :
                          </label>
                          <div class="col-md-6">
                                <select class="form-control" name="is_active" value="{{ $product->is_active }}" required autocomplete="is_active" autofocus >
                                  <option value="1">Active</option>
                                  <option value="0">Deactive</option>
                                </select>

                               @error('is_active')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                          </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn fs-5" style=" color:rgb(241, 169, 13) ;background-color: rgb(21, 21, 20)">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
 </div>
 @endsection

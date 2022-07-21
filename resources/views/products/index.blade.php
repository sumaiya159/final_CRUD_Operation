@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="p-3 text-center">
                <a href="{{ route('home') }}" class="btn btn-info fw-bold fs-3  ms-3 text-decoration-none">Back</a>
                <a href="{{ route('products.create')}}" class="btn btn-primary fw-bold fs-3 ms-3 text-decoration-none "> Add Product</a>
            </div>
            <div class="me-4">
                <table class="table  table table-success table-striped bg-white border border-warning p-5">
                    <thead>
                        <tr>


                            <th>SL</th>
                            <th>Name</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>price</th>
                            <th class="text-center">Active Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                       $sl =1;
                       @endphp
                      @foreach($products as $product)
                      <tr>
                        <td>{{ $sl++ }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            @if ($product->image){
                                @if (exists('uploads/products'.$product->image)){
                                    <img src="{{ asset('uploads/products' . $product->image) }}"
                                   height="25" width="40">
                                }
                                @else
                                <small>Image not exists in path</small>
                                @endif
                                <small>No Image</small>
                            @endif
                        </td>
                        <td class="text-center">{{ $product->price }}</td>
                        <td class="text-center">
                            <form action="{{ route('products.changeStatus', $product->id) }}" method="post">
                             @csrf
                             @method('GET')

                                @if ($product['is_active'] == 1)
                                    <button type="submit" class="btn btn-success">Active</button>
                                @else
                                    <button type="submit" class="btn btn-danger">Inactive</button>
                                @endif

                            </form>
                        </td>
                        <td class="text-end">
                          <div class="btn-group">
                           <a class="btn btn-success" href="{{ route('products.show',$product->id) }}"><i class="fa fa-eye"></i></a>
                           <a class="btn btn-info"  href="{{ route('products.edit',$product->id) }}"><i class="fa fa-edit"></i></a>
                           <form action="{{ route('products.destroy', $product->id) }}" method="post">
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to move this product to trashed ?')" title="Move to Trashed">
                                <i class="fa fa-trash"></i></button>

                           </form>
                          </div>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>




                  



        </div>
    </div>
</div>
@endsection

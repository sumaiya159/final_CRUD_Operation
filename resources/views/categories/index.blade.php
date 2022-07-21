@extends('layouts.app')
@section('content')

 <div class="container">
  <div class="justify-content-center">
    <div class="col-md-10">
      <h1 style="color:orange" class="text-center">Categories Page</h1>
      <div class="p-3 text-center ">
        <a href="{{ route('home') }}" class="btn btn-info fw-bold text-white fs-4  ms-4 text-decoration-none">Back</a>
        <a href="{{ route('categories.create')}}" class="btn btn-primary fw-bold fs-4 ms-4 text-decoration-none "> Add Product</a>
    </div>

    <div class="row ms-5" >
      <table  class=" table ms-5 table-success table-striped bg-white border border-warning p-5">
        <thead>
          <tr >
            <th class="ms-5">SL</th>
            <th>Name</th>
            <th class="text-center"> Status</th>
            <th class="text-end">Actions</th>

           </tr>
        </thead>
        <tbody>
          @php
          $sl =1;
         @endphp
           @foreach($categories as $category)
           <tr>
            <td>
              {{ $sl++ }}
            </td>
            <td>{{ $category->name}}</td>
            <td class="text-center">
              <form action="{{ route('categories.changeStatus', $category->id) }}" method="post">
              @csrf
              @method('GET')

                  @if ($category->is_active == 1)
                      <button type="submit" class="btn btn-success">Active</button>
                  @else
                      <button type="submit" class="btn btn-danger">Inactive</button>
                  @endif

              </form>
          </td>
            <td class="text-end">
              <div class="btn-group">
                <a href="{{ route('categories.show', $category->id ) }}" class="btn btn-primary me-1"><i class="fa fa-eye"></i></a>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info me-1"><i class="fa fa-edit"></i></a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                  @csrf
                   @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to move this category to trashed ?')" title="Move to Trashed">
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
@endsection

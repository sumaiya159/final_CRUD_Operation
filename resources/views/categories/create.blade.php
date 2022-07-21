@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 w-75">

            <div class="row justify-content-center g-0">
                <div class="col-12 mb-2 text-end">
                    <a href="{{ route('categories.index') }}" class="btn" style=" color:rgb(28, 25, 25) ;background-color: rgb(245, 182, 11)">Back</a>
                </div>
            </div>

            <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="card  text-dark bg-warning ">

                    <div class="card-header">
                        <h3>Create Category</h3>
                    </div>

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="row">
                                <div class="col-12 alert alert-danger p-1 m-0">
                                    <ul class="g-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <div class="row p-3">
                            <label for="name" class="col-md-2 col-form-label fs-4 fw-semibold">Name <b class="text-danger">*</b></label>
                            <div class="col-md-10">
                                <input type="text" id="name" class="form-control" value="{{ old('name') }}" name="name"
                                    placeholder="Enter Category name" required autofocus>
                            </div>
                        </div>

                        <div class="card-footer float-end">
                            <button type="submit" class="rounded" style=" color:rgb(245, 240, 240) ;background-color: rgb(23, 24, 20)">Add Category</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

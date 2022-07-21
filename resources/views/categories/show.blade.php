@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                  <div class="p-2 text-end">
                        <a href="{{ route('categories.index') }}" class="btn" style=" color:rgb(28, 25, 25) ;background-color: rgb(245, 182, 11)">Back</a>
                  </div>
                <div class="card rounded-3 text-dark bg-warning fs-2 fw-semibold">
                    <div class="card-header fw-bold">{{ __('Categories details') }}</div>

                    <div class="card-body">
                            <div class="mb-3 row">
                                <label for="name" class=" fs-4 fw-semibold col-md-4 col-form-label text-end">
                                    {{ __('Name') }} :
                                </label>

                                <div class="col-md-6 fs-3 fw-semibold">
                                    <strong>{{ $category->name }}</strong>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="name" class=" fs-4 ms-5 fw-semibold col-md-4 col-form-label text-end">
                                    {{ __('Active Status') }} :
                                </label>

                                <div class="col-md-6 fs-3 fw-semibold">
                                    <strong>{{ $category->is_active }}</strong>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

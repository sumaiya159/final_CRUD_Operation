@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                  <div class="p-2 text-end">
                        <a href="{{ route('categories.index') }}" class="btn" style=" color:rgb(28, 25, 25) ;background-color: rgb(245, 182, 11)">Back</a>
                  </div>

                <div class="card card rounded-3 text-dark bg-warning fs-5 fw-semibold">
                    <div class="card-header fw-bold">{{ __('Edit Category') }}</div>


                    <div class="card-body">
                        <form method="POST" action="{{ route('categories.update',$category->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-end">
                                    {{ __('Name') }} :
                                </label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $category->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">

                             </div>

                             <div class="mb-3 row">
                              <label for="is_active" class="col-md-4 col-form-label text-end">
                                  {{ __('Active Status') }} :
                              </label>

                              <div class="col-md-6">

                                    <select class="form-control" name="is_active" value="{{ $category->is_active }}" required autocomplete="is_active" autofocus >
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

@extends('admin.master')
@section('title', __('keywords.edit_service'))
@section('content')
   <div class="container-fluid">
          <div class="row justify-content-center">
          
                <div class="col-12">
                 <h5 class="h5 page-title">{{ __('keywords.edit_service') }}</h5>

                  <div class="card shadow">
                    <div class="card-body">
                   <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                         <div class="row">
                    <div class="col-md-6">
                        <label for="title">{{ __('keywords.title') }}</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $service->title) }}" placeholder="{{$service->title}}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>

                      <div class="col-md-6">
                        <label for="icon">{{ __('keywords.icon') }}</label>
                        <input type="text" id="icon" name="icon" class="form-control" placeholder="{{$service->icon }}" value="{{ old('icon', $service->icon) }}">
                        @error('icon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="col-md-12 mt-3">
                        <label for="description">{{ __('keywords.description') }}</label>
                        <textarea id="description" name="description" class="form-control" placeholder="{{ $service->description }}">{{ old('description', $service->description) }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                 
                  </div>
                     <button type="submit" class="btn btn-primary btn-sm mt-3">{{ __('keywords.submit') }}</button>
                  </form>
                  </div>
                </div> 
        </div> 
   
@endsection
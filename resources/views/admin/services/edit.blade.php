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
                  <x-form-label field="title"></x-form-label>
                  <input type="text" id="title" name="title" class="form-control"
                    value="{{ old('title', $service->title) }}" placeholder="{{$service->title}}">
                  <x-validation-error field="title"></x-validation-error>
                </div>

                <div class="col-md-6">
                  <x-form-label field="icon"></x-form-label>
                  <input type="text" id="icon" name="icon" class="form-control" placeholder="{{$service->icon }}"
                    value="{{ old('icon', $service->icon) }}">
                  <x-validation-error field="icon"></x-validation-error>
                </div>

                <div class="col-md-12 mt-3">
                  <x-form-label field="description"></x-form-label>
                  <textarea id="description" name="description" class="form-control"
                    placeholder="{{ $service->description }}">{{ old('description', $service->description) }}</textarea>
                  <x-validation-error field="description"></x-validation-error>
                </div>

              </div>
              <x-submit-button></x-submit-button>
            </form>
          </div>
        </div>
      </div>

@endsection
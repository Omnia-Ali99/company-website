@extends('admin.master')
@section('title', __('keywords.edit_feature'))
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">

      <div class="col-12">
        <h5 class="h5 page-title">{{ __('keywords.edit_feature') }}</h5>

        <div class="card shadow">
          <div class="card-body">
            <form action="{{ route('admin.features.update', $feature) }}" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <x-form-lable field="title"></x-form-lable>
                  <input type="text" id="title" name="title" class="form-control"
                    value="{{ old('title', $feature->title) }}" placeholder="{{$feature->title}}">
                  <x-validation-error field="title"></x-validation-error>
                </div>

                <div class="col-md-6">
                  <x-form-lable field="icon"></x-form-lable>
                  <input type="text" id="icon" name="icon" class="form-control" placeholder="{{$feature->icon }}"
                    value="{{ old('icon', $feature->icon) }}">
                  <x-validation-error field="icon"></x-validation-error>
                </div>

                <div class="col-md-12 mt-3">
                  <x-form-lable field="description"></x-form-lable>
                  <textarea id="description" name="description" class="form-control"
                    placeholder="{{ $feature->description }}">{{ old('description', $feature->description) }}</textarea>
                  <x-validation-error field="description"></x-validation-error>
                </div>

              </div>
              <x-submit-button></x-submit-button>
            </form>
          </div>
        </div>
      </div>

@endsection
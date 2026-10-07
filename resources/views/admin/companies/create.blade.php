@extends('admin.master')
@section('title', __('keywords.add_new_company'))
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">

      <div class="col-12">
        <h5 class="h5 page-title">{{ __('keywords.add_new_company') }}</h5>

        <div class="card shadow">
          <div class="card-body">
            <form action="{{ route('admin.companies.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">

       

                <div class="col-md-12 mt-2">
                  <x-form-label field="image"></x-form-label>
                  <input type="file" name="image" class="form-control-file">
                  <x-validation-error field="image"></x-validation-error>
                </div>


              <x-submit-button></x-submit-button>
            </form>
          </div>
        </div>
      </div>

@endsection
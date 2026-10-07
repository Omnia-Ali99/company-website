@extends('admin.master')
@section('title', __('keywords.companies'))
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <!-- simple table -->
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">{{ __('keywords.companies') }}</h2>

          <div class="page-title-right">
            <x-action-button href="{{ route('admin.companies.create') }}" type="create"></x-action-button>
          </div>
        </div>
        <div class="card shadow">
          <div class="card-body">

            <x-success-alert-component></x-success-alert-component>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th width="5%">#</th>
                  <th >{{ __('keywords.image') }}</th>
                  <th width="15%">{{ __('keywords.actions') }}</th>

                </tr>
              </thead>
              <tbody>

                <tr>
                  @if($companies->count() > 0)
                    @foreach($companies as $key => $company)
                      <tr>
                        <td>{{ $companies->firstItem() + $loop->index }}</td>
                        <td>
                          <img src="{{ asset("storage/companies/$company->image") }}" alt="#" width="50px">
                        </td>

                        <td>

                          <x-action-button href="{{ route('admin.companies.edit', $company) }}" type="edit"></x-action-button>

                          <x-action-button href="{{ route('admin.companies.show', $company) }}" type="show"></x-action-button>

                          <x-delete-button href="{{ route('admin.companies.destroy', $company) }}"></x-delete-button>
                        </td>
                      </tr>
                    @endforeach
                  @else
                  <x-empty-alert></x-empty-alert>
                @endif
                </tr>

              </tbody>
            </table>
            {{ $companies->render('pagination::bootstrap-4') }}
          </div>
        </div>
      </div> <!-- simple table -->
    </div>

@endsection
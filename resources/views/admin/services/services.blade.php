@extends('admin.master')
@section('title', __('keywords.services'))
@section('content')
   <div class="container-fluid">
          <div class="row justify-content-center">
              <!-- simple table -->
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                    <h2 class="h5 page-title">{{ __('keywords.services') }}</h2>

                    <div class="page-title-right">
                      <x-action-button href="{{ route('admin.services.create') }}" type="create"></x-action-button>
                    </div>
                </div>
                  <div class="card shadow">
                    <div class="card-body">

                   <x-success-alert-component></x-success-alert-component>

                      <table class="table table-hover">
                        <thead>
                          <tr>
                           <th width="5%">#</th>
                                    <th>{{ __('keywords.title') }}</th>
                                    <th width="15%">{{ __('keywords.icon') }}</th>
                                    <th width="15%">{{ __('keywords.actions') }}</th>
                          </tr>
                        </thead>
                        <tbody>
                     
                          <tr>
                          <th width="5%">#</th>
                          <th>{{ __('keywords.title') }}</th>
                          <th width="15%">{{ __('keywords.icon') }}</th>
                          <th width="15%">{{ __('keywords.actions') }}</th>
                          </tr>
                          <tr>
                            @if($services->count()>0)
                              @foreach($services as $key => $service)
                                <tr>
                                  <td>{{ $services->firstItem() + $loop->index }}</td>
                                  <td>{{ $service->title }}</td>
                                  <td><i class="fe {{ $service->icon }} fa-2x"></i></td>
                                  <td>
                                    
                                    <x-action-button href="{{ route('admin.services.edit', $service) }}" type="edit" ></x-action-button>
                                                        
                                    <x-action-button href="{{ route('admin.services.show', $service) }}" type="show"></x-action-button>

                                 <x-delete-button href="{{ route('admin.services.destroy', $service) }}"></x-delete-button>
                                  </td>
                                </tr>
                              @endforeach
                            @else
                              <x-empty-alert></x-empty-alert>
                            @endif
                          </tr>
                      
                        </tbody>
                      </table>
                          {{ $services->render('pagination::bootstrap-4') }}
                    </div>
                  </div>
                </div> <!-- simple table -->
        </div> 
   
@endsection
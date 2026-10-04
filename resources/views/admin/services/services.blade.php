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
                        <a href="{{ route('admin.services.create') }}" class="btn btn-sm btn-primary">{{ __('keywords.add_new') }}</a>
                    </div>
                </div>
                  <div class="card shadow">
                    <div class="card-body">
                     @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                     @endif

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
                                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-success">
                                        <i class="fe fe-edit fa-2x"></i>
                                    </a>
                                    <a href="{{ route('admin.services.show', $service) }}" class="btn btn-sm btn-primary">
                                        <i class="fe fe-eye fa-2x"></i>
                                    </a>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('keywords.confirm_delete') }}')">
                                            <i class="fe fe-trash-2 fa-2x"></i>
                                        </button>
                                    </form>
                                  </td>
                                </tr>
                              @endforeach
                            @else
                              <tr>
                                <td colspan="4" class="alert alert-danger text-center">{{ __('keywords.no_records_found') }}</td>
                              </tr>
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
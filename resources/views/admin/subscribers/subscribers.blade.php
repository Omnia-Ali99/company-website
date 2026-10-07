@extends('admin.master')
@section('title', __('keywords.subscribers'))
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <!-- simple table -->
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">{{ __('keywords.subscribers') }}</h2>


        </div>
        <div class="card shadow">
          <div class="card-body">

            <x-success-alert-component></x-success-alert-component>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th width="5%">#</th>
                  <th>{{ __('keywords.email') }}</th>
                   <th width="15%">{{ __('keywords.actions') }}</th>
                </tr>
              </thead>
              <tbody>

        
                <tr>
                  @if($subscribers->count() > 0)
                    @foreach($subscribers as $key => $subscriber)
                      <tr>
                        <td>{{ $subscribers->firstItem() + $loop->index }}</td>
                        <td>{{ $subscriber->email }}</td>
                        <td>



                          <x-delete-button href="{{ route('admin.subscribers.destroy', $subscriber) }}"></x-delete-button>
                        </td>
                      </tr>
                    @endforeach
                  @else
                  <x-empty-alert></x-empty-alert>
                @endif
                </tr>

              </tbody>
            </table>
            {{ $subscribers->render('pagination::bootstrap-4') }}
          </div>
        </div>
      </div> <!-- simple table -->
    </div>

@endsection
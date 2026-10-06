@extends('admin.master')
@section('title', __('keywords.messages'))
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <!-- simple table -->
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">{{ __('keywords.messages') }}</h2>


        </div>
        <div class="card shadow">
          <div class="card-body">

            <x-success-alert-component></x-success-alert-component>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th width="5%">#</th>
                  <th>{{ __('keywords.name') }}</th>
                  <th>{{ __('keywords.email') }}</th>
                  <th>{{ __('keywords.subject') }}</th>
                   <th width="15%">{{ __('keywords.actions') }}</th>
                </tr>
              </thead>
              <tbody>

        
                <tr>
                  @if($messages->count() > 0)
                    @foreach($messages as $key => $message)
                      <tr>
                        <td>{{ $messages->firstItem() + $loop->index }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>


                          <x-action-button href="{{ route('admin.messages.show', $message) }}" type="show"></x-action-button>

                          <x-delete-button href="{{ route('admin.messages.destroy', $message) }}"></x-delete-button>
                        </td>
                      </tr>
                    @endforeach
                  @else
                  <x-empty-alert></x-empty-alert>
                @endif
                </tr>

              </tbody>
            </table>
            {{ $messages->render('pagination::bootstrap-4') }}
          </div>
        </div>
      </div> <!-- simple table -->
    </div>

@endsection
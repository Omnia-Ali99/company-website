@extends('admin.master')
@section('title', __('keywords.members'))
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <!-- simple table -->
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">{{ __('keywords.members') }}</h2>

          <div class="page-title-right">
            <x-action-button href="{{ route('admin.members.create') }}" type="create"></x-action-button>
          </div>
        </div>
        <div class="card shadow">
          <div class="card-body">

            <x-success-alert-component></x-success-alert-component>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th width="5%">#</th>
                  <th>{{ __('keywords.name') }}</th>
                  <th>{{ __('keywords.position') }}</th>
                  <th width="10%">{{ __('keywords.image') }}</th>
                  <th>{{ __('keywords.facebook') }}</th>
                  <th>{{ __('keywords.twitter') }}</th>
                  <th>{{ __('keywords.linkedin') }}</th>

                  <th width="15%">{{ __('keywords.actions') }}</th>

                </tr>
              </thead>
              <tbody>

                <tr>
                  @if($members->count() > 0)
                    @foreach($members as $key => $member)
                      <tr>
                        <td>{{ $members->firstItem() + $loop->index }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->position }}</td>
                        <td>
                          <img src="{{ asset("storage/members/$member->image") }}" alt="#" width="50px">
                        </td>
                        <th>{{ $member->facebook }}</th>
                        <th>{{$member->twitter }}</th>
                        <th>{{$member->linkedin }}</th>

                        <td>

                          <x-action-button href="{{ route('admin.members.edit', $member) }}" type="edit"></x-action-button>

                          <x-action-button href="{{ route('admin.members.show', $member) }}" type="show"></x-action-button>

                          <x-delete-button href="{{ route('admin.members.destroy', $member) }}"></x-delete-button>
                        </td>
                      </tr>
                    @endforeach
                  @else
                  <x-empty-alert></x-empty-alert>
                @endif
                </tr>

              </tbody>
            </table>
            {{ $members->render('pagination::bootstrap-4') }}
          </div>
        </div>
      </div> <!-- simple table -->
    </div>

@endsection
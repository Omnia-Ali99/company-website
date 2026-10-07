@extends('admin.master')
@section('title', __('keywords.show_member'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.show_member') }}</h2>

                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="name">{{ __('keywords.name') }}</label>
                                <p class="form-control">{{ $member->name }}</p>
                            </div>

                            <div class="col-md-5">
                                <label for="position">{{ __('keywords.position') }}</label>
                                <p class="form-control">{{ $member->position }}</p>
                            </div>

                            <div class="col-md-2">
                                <label for="image">{{ __('keywords.image') }}</label>
                                <div>
                                    <img src="{{ asset("storage/members/$member->image") }}" alt="#" width="35px">
                                </div>
                            </div>

                     
                            <div class="col-md-5">
                                <label>{{ __('keywords.facebook') }}</label>
                                <p class="form-control">
                                    @if($member->facebook)
                                        <a href="{{ $member->facebook }}" target="_blank">
                                            {{ $member->facebook }}
                                        </a>
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-5">
                                <label>{{ __('keywords.twitter') }}</label>
                                <p class="form-control">
                                    @if($member->twitter)
                                        <a href="{{ $member->twitter }}" target="_blank">
                                            {{ $member->twitter }}
                                        </a>
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-5">
                                <label>{{ __('keywords.linkedin') }}</label>
                                <p class="form-control">
                                    @if($member->linkedin)
                                        <a href="{{ $member->linkedin }}" target="_blank">
                                            {{ $member->linkedin }}
                                        </a>
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
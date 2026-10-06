@extends('admin.master')
@section('title', __('keywords.show_feature'))
@section('content')
   <div class="container-fluid">
          <div class="row justify-content-center">
          
                <div class="col-12">
                 <h5 class="h5 page-title">{{ __('keywords.show_feature') }}</h5>

                  <div class="card shadow">
                    <div class="card-body">
                  
                         <div class="row">
                    <div class="col-md-6">
                        <label for="title">{{ __('keywords.title') }}</label>
                        <p type="text" id="title" name="title" class="form-control" >{{ $feature->title }}</p>
                       
                     </div>

                      <div class="col-md-6">
                        <label for="icon">{{ __('keywords.icon') }}</label>
                        <p type="text" id="icon" name="icon" class="form-control" >{{ $feature->icon }}</p>
                     
                      </div>

                      <div class="col-md-12 ">
                        <label for="description">{{ __('keywords.description') }}</label>
                        <p id="description" name="description" class="form-control" >{{ $feature->description }}</p>
                     
                      </div>
                 
                  </div>
                  
                  </div>
                </div> 
        </div> 
   
@endsection
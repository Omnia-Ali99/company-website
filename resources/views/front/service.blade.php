@extends('front.master');

@section('title', 'Service');

@section('active_service', 'active')
@section('hero')
<x-hero-section title="Our Services" subtitle="Services"></x-hero-section>
@endsection
@section('content')

     
  <x-front-services-component></x-front-services-component>


       
<x-front-testimonials-component></x-front-testimonials-component>


@endsection
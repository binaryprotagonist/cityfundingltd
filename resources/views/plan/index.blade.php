@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
       <div class="col-md-12">
           @if(Session::get('message'))
            <div class="alert alert-{{ Session::get('status') ? 'success' : 'danger' }}" role="alert">
              {{ Session::get('message') }}
            </div>
           @endif
       </div>
    </div>
    <div class="row">
       @foreach($plans as $plan)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$plan->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted"> £ {{$plan->monthly}} / Monthly</h6>
                    <h6 class="card-subtitle mb-2 text-muted"> £ {{$plan->yearly}} / yearly</h6>
                     <hr>
                    <h6 class="card-subtitle mb-2 text-muted"> {{$plan->property}} Property</h6>
                    <a href="{{route('payment.buyNow',$plan->id)}}" class="card-link">Buy now</a>
                </div>
            </div>
        </div>
       @endforeach
    </div>
  </div>
@endsection
@push('css')
 <style>
    .card{
        margin : 10px auto;
    }
 </style>
@endpush


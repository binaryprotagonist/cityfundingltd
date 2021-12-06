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
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                <div class="card-body">
                    <p><b>Name</b>  : {{ $user->name }}</p>
                    <p><b>Email</b> : {{ $user->email }}</p>
                    <p><b>Address</b>  : {{ $user->address }}</p>
                    <p><b>City</b> : {{ $user->city }}</p>
                    <p><b>Postal Code</b> : {{ $user->postal_code }}</p>
                </div>
            </div>
            <br/>
            <div class="card">
                <div class="card-header">{{ __('Subscribed Plan') }}</div>
                <div class="card-body">
                   @if($subscription)
                        <p><b>Plan Id</b>  : #PlANID{{ $subscription->plan_id }}</p>
                        <p><b>Subscription Id</b> : #{{ $subscription->subscription_id }}</p>
                        <p><b>Plan Title</b>  : {{ $subscription->plan_title }}</p>
                        <p><b>Plan Property</b> : {{ $subscription->plan_property }}</p>
                        <p><b>Plan Status</b> : {{ $subscription->subscription_status == '1' ? 'Activated' : 'Cancelled' }}</p>
                        <p><b>Active Date</b> : {{ date('Y-M-d',strtotime($subscription->created_at)) }}</p>
                        <a href="{{route('subscription.cancel',$subscription->id)}}">Cancel Subscription</a>
                   @else
                     <h3>{{ __('You have no any active plan') }}</h3>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

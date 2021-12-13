@extends('layouts.app')
@section('content')
    <!-- home Page -->
    <section id="home">

     <div class="container">
        <div class="content text-center">
          <h1 class="mb-3">Portfolio Info</h1>
          <small class="mb-5">
          Portfolio Info is a property information service, we are here to help you with all your property and portfolio data requirements. Our goal Is to make your business easier and smoother and to save you time and manual labour work for you and your client…..
          </small>
          <form action="{{route('search')}}" id="search-form">
            <p class="mb-3">Search Company Name:</p>
            <div class="input-group">
              <input
                type="text"
                class="form-control"
                placeholder="{{ __('Search')}}"
                name="q"
              />
            <a  href="javascript:void(0)" class="filterlink" onClick="event.preventDefault();
                                        document.getElementById('search-form').submit();">{{__('Search')}} <i  class="fa fa-search"></i></a> 
             
            </div>
          </form>
        </div>
      </div>
     </section>
@endsection
@push('js')

@endpush
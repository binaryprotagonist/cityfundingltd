@extends('layouts.app')
@section('content')
    <!-- home Page -->
    <section id="home">

     <div class="container">
        <div class="content text-center">
          <h1 class="mb-3">Lorem ipsum is simply dummy text</h1>
          <small class="mb-5">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga,
            perferendis? Quia amet, eaque reprehenderit sint minus recusandae
            repellendus aspernatur accusantium est perferendis, eius porro ad
            vero nemo. architecto!
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
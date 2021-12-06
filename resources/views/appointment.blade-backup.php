@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center text-center">
            <form role="form" method="get">
              <div class="form-group">
                <h3 class="text-center">Enter company name, number or officer name</h3>
                <input type="text" name="q" value="{{Request::get('q')}}" placeholder="Comany Name,Pearson Name" class="form-control" />
              </div>
              <input type="submit" value="{{__('Search')}}" class="btn btn-success" />
            </form>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <h1>{{ $company->company_name }}</h1>
        <h5>Total Number Of Appointment : {{$appointment->total_results}}</h5>
        <p>Date Of Birth : {{ date('D Y',strtotime($company->date_of_creation)) }}</p>
        @foreach($appointment->items as $item)
            <div>
               <h4><a href="javascript:void(0)">{{$item->name}}</a></h4>
               <p>Appointment On {{$item->appointed_on}}</p>
               <p>Role {{$item->officer_role}}</p>
               <p>Appointment On {{$item->appointed_on}}</p>
               <p>Appointment On {{$item->appointed_on}}</p>
               <p>Appointment On {{$item->appointed_on}}</p>
            </div>
        @endforeach
      </div>
    </div>
</div>
@endsection

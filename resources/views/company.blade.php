@extends('layouts.app')
@section('content')
    <section id="portfoliopage">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
             <p>Company Name</p>
            <b>{{$company->company_name}}</b>
            <p>Registered office address</p>
            <b>{{ $company->registered_office_address->address_line_1 }} ,{{ $company->registered_office_address->locality }} , {{ $company->registered_office_address->postal_code }}</b>
            <p>Company status</p>
            <b>{{ $company->company_status }}</b>
          </div>
          <div class="col-md-6">
             <p>Dissolved on</p>
            <b>{{ $company->date_of_cessation }}</b>
            <p>Company type</p>
            <b>{{ $company->type }}</b>
            <p>Incorporated on</p>
            <b>{{ $company->date_of_creation }}</b>
          </div>
        </div>
      </div>
    </section>
@endsection
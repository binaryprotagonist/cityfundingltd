@extends('layouts.app')
@section('content')
    <section id="download">
      <div class="container">
        <div class="content">
          <h3>Lorem ipsum dolor sit amet.</h3>
          <div class="downloadbutton">
              <a href="{{route('exportPorfolio')}}"><i class="fa fa-download"></i> {{__('Download')}}</a>
          </div>
      </div>
    </div>
    </section>
    <section id="portfoliopage">
      <div class="container">
        <div class="wrapper">
          <table class="table table-bordered">
            <thead>
                <tr>
                      <td>Address</td>
                      <td>Value</td>
                      <td>Outstanding Mortgage</td>
                      <td>Monthly Rental Income</td>
                      <td>Monthly Mortgage Payment</td>
                      <td>Purchase Prise</td>
                      <td>Purchase Date</td>
                      <td>Lender Name</td>
                      <td>Property Type</td>
                      <td>Owners Name (Company)</td>
                      <td>Ownership % </td>
                      <td>Bedrooms</td>
                      <td>HMO / MUF</td>
                      <td>Size (SQM - SQF)</td>
                </tr>
            </thead>
            <tbody>
              @if($companies->toarray())
                @foreach($companies as $key => $item)
                    <tr>
                        <td>{{$item->address}}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>{{$item->purchase_price}}</td>
                        <td>{{$item->purchase_date}}</td>
                        <td>-</td>
                        <td>{{$item->property_type}}</td>
                        <td>{{$item->company_name}}</td>
                        <td>{{$item->ownership}}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </section>
@endsection
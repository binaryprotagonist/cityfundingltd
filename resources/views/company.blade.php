@extends('layouts.app')
@section('content')
    <section id="portfoliopage">
      <div class="container">
        <div class="wrapper">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Name</th></th>
                <th scope="col">Status</th>
                <th scope="col">Address</th>
                <th scope="col">Role</th>
                <th scope="col">Appointed on</th>
                <th scope="col">Nationality</th>
                <th scope="col">Occupation</th>
              </tr>
            </thead>
            <tbody>
              @if($officer->total_results > 0)
                @foreach($officer->items as $key => $item)
                    <tr>
                        <td><a href="{{route('company',$company->company_number)}}">{{$item->name}}</a></td>
                        <td>{{$item->appointed_to->company_status}}</td>
                        <td>{{$item->address->address_line_1 .','. $item->address->locality .','. $item->address->postal_code .','. $item->address->country }}</td>
                        <td>{{$item->officer_role}}</td>
                        <td>{{$item->appointed_on}}</td>
                        <td>{{$item->nationality}}</td>
                        <td>{{$item->occupation}}</td>
                    </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </section>
@endsection
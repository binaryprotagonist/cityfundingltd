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
    @if(Request::get('q'))
    <div class="row justify-content-center">
      <div class="col-md-10">
         <table class="table">
            <tbody>
              @forelse($companies as $key => $company)
                  <tr>
                    <td>
                     <a href="{{route('appointment',$company->company_number)}}">{{$company->title}}</a><br/>
                     <small>Total number of appointments {{ $company->total_appointment}} - Born {{date('M Y',strtotime($company->date_of_creation))}}</small><br/>
                     <small>{{ $company->address_snippet }}</small><br/>
                     </td>
                  </tr>
              @empty
                 <tr>
                   <td>{{ __('Record not found') }}</td>
                 </tr>
              @endforelse
            </tbody>
         </table>
          <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
      </div>
    </div>
    @endif
</div>
@endsection

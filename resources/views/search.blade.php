@extends('layouts.app')
@section('content')
   <!-- Filter Page -->

    <section id="filter">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <form action="{{route('search')}}" method="get">
              <div class="input-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Search"
                  name="q"
                  value="{{Request::get('q')}}"
                />
                <button class="btn btn-default" type="submit">
                  {{__('Look up')}} <i class="fa fa-search"></i>
                </button>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <form action="{{route('search')}}" id="filter-form" method="get">
             <input type="hidden" name="q" value="{{Request::get('q')}}">
             <div class="row">
                <div class="col-md-3">
                  <div class="input-group">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="{{__('Born Year')}}"
                      name="year"
                      value="{{Request::get('year')}}"
                      autocomplete="off"
                    />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="input-group">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="{{__('Born month')}}"
                      name="month"
                      value="{{Request::get('month')}}"
                      autocomplete="off"
                    />
                  </div>
                </div>
             </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- data table -->
    <section id="table">
      <div class="container">
            @if($total_results > 0)
              @foreach($items as $item)
                @php $item = (Object) $item @endphp
                    <div class="blur" style="border-bottom:1px solid #e7e7e7">
                       @php $arr = explode('/',$item->self);@endphp
                       @if(isset($item->company_number)  && !empty($item->company_number))
                        <a href="{{ route('company',$arr['2'])}}">{{$item->title}}</a>
                       @else
                        <a href="{{ route('officers',$arr['2'])}}">{{$item->title}}</a>
                       @endif
                      <br/>
                      <small>{{$item->description}}</small>
                      <p>{{$item->address}}</p>
                    </div>
              @endforeach
            {{-- <nav aria-label="Page navigation example">
              <ul class="pagination">
                  @php
                  $total_pages  = ceil($total_results / $items_per_page);  
                  $dots = false;
                  for ($i=1; $i<=$total_pages; $i++) {
                    if($i <= 11){
                      if ($i==$page_number){
                        echo '<li class="page-item active"><a class="page-link" href="' . route('search',['page'=>$i,'q'=>Request::get('q'),'year'=>Request::get('year'),'month'=>Request::get('month')]). '">'.$i.'</a></li>';
                      }else{
                        if ($i <= 10) { 
                          echo '<li class="page-item"><a class="page-link" href="' . route('search',['page'=>$i,'q'=>Request::get('q'),'year'=>Request::get('year'),'month'=>Request::get('month')]). '">'.$i.'</a></li>';
                        } elseif ($i > 10) {
                          echo '<li class="page-item"><a class="page-link" href="' . route('search',['page'=>$i,'q'=>Request::get('q'),'year'=>Request::get('year'),'month'=>Request::get('month')]). '">'.__("Next").'</a></li>';
                        }
                      }
                    }
                  }  
                  @endphp
              </ul>
            </nav> --}}
            @else
            @endif
          </tbody>
        </table>
      </div>
      @if(Auth::guest())
      <div class="container">
        <div class="filter-login">
          <h4 class="mb-4">To View them Login</h4>
          <div class="btn login-filter">
            <a
              data-bs-toggle="modal"
              data-bs-target="#loginModal"
              class="filter-sign"
              >Login</a
            >
            <a
              data-bs-toggle="modal"
              data-bs-target="#signupModal"
              class="filter-create"
              >Create account</a
            >
          </div>
        </div>
      </div>
      @endif
    </section>
    <!-- Login and Signup -->
    <section id="home" class="p-0">
      <div
        class="modal fade"
        id="loginModal"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="login-homepage">
                <span>Don't have account ?</span>
                <a data-bs-target="#signupModal" data-bs-toggle="modal"
                  >Create account</a
                >
                <div class="formcontents">
                  <h1 class="mb-3 mt-3">Login to your account</h1>
                  <p class="mb-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Possimus doloremque natus
                  </p>
                </div>
                <form>
                  <div class="input-group">
                    <label class="email" for="email">Email</label>
                    <input
                      type="email"
                      class="form-control"
                      placeholder="abc@braininventory.com"
                      name="email"
                      autocomplete="off"
                    />
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="input-group">
                    <label class="password" for="password">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      placeholder="password"
                      name="password"
                    />
                    <i class="fa fa-eye"></i>
                  </div>
                  <div class="forget-password">
                    <a href="#">Forgot Password ?</a>
                  </div>
                  <div class="btn-group">
                    <button class="btn-primary" type="submit">Login</button>
                  </div>

                  <div class="google-btn">
                    <p>Or Connect with:</p>
                    <div class="btn-group">
                      <i class="fa fa-google"></i>
                      <a href="#">Continue with Google</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div
        class="modal fade"
        id="signupModal"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="login-homepage">
                <span>Have an account ?</span>
                <a data-bs-target="#loginModal" data-bs-toggle="modal"
                  >Sign In</a
                >
                <div class="formcontents">
                  <h1 class="mb-3 mt-3">Welcome to City Funding</h1>
                  <p class="mb-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Possimus doloremque natus
                  </p>
                </div>
                <form>
                  <div class="input-group">
                    <label class="email" for="email">Email</label>
                    <input
                      type="email"
                      class="form-control"
                      placeholder="abc@braininventory.com"
                      name="email"
                      autocomplete="off"
                    />
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="input-group">
                    <label class="password" for="password">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      placeholder="password"
                      name="password"
                    />
                    <i class="fa fa-eye"></i>
                  </div>
                  <div class="input-group">
                    <label class="password" for="password"
                      >Confirm Password</label
                    >
                    <input
                      type="password"
                      class="form-control"
                      placeholder="Confirm Password"
                      name="password"
                    />
                    <i class="fa fa-eye"></i>
                  </div>
                  <!-- <div class="forget-password">
                      
                  </div> -->
                  <div class="btn-group" id="create">
                    <button class="btn-primary" type="submit">
                      Create an account
                    </button>
                  </div>

                  <div class="google-btn">
                    <p>Or Connect with:</p>
                    <div class="btn-group">
                      <i class="fa fa-google"></i>
                      <a href="#">Continue with Google</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     @if(Auth::check())
      <style>
       .blur:nth-child(n + 3) {
          filter: none !important;
       }
      </style>
     @endif
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $('input[name="year"]').on('change',function(e){
           e.preventDefault();
           $('#filter-form').submit();
      });
      $('input[name="month"]').on('change',function(e){
           e.preventDefault();
           $('#filter-form').submit();
      });
      $('input[name="year"]').datepicker({
          format: "yyyy",
          viewMode: "years", 
          minViewMode: "years",
          autoclose:true //to close picker once year is selected
      });
      $('input[name="month"]').datepicker({
          format: "M",
          viewMode: "months", 
          minViewMode: "months",
          autoclose:true //to close picker once year is selected
      });
    </script>
@endpush

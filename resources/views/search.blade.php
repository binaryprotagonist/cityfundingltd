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
            <form action="{{route('search')}}" method="get">
              <div class="input-group" id="box-right">
                <input
                  type="text"
                  class="form-control"
                  placeholder="{{__('Type here to filter results...')}}"
                  name="filter"
                  value="{{Request::get('filter')}}"
                />
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- data table -->
    <section id="table">
      <div class="container">
            @if($companies->total_results > 0)
              @foreach($companies->items as $item)
                    <div style="border-bottom:1px solid #e7e7e7">
                       @php $arr = explode('/',$item->links->self);@endphp
                       @if(isset($item->company_number)  && !empty($item->company_number))
                        <a href="{{ route('company',$arr['2'])}}">{{$item->title}}</a>
                       @else
                        <a href="{{ route('officers',$arr['2'])}}">{{$item->title}}</a>
                       @endif
                      <br/>
                      <small>{{$item->description}}</small>
                      <p>{{$item->address_snippet}}</p>
                    </div>
              @endforeach
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                  @php
                  $total_pages = ceil($companies->total_results / $companies->items_per_page);  
                  for ($i=1; $i<=$total_pages; $i++) {
                    if ($i==$companies->page_number) {
                        echo '<li class="page-item active"><a class="page-link" href="' . route('search',['page'=>$i,'q'=>Request::get('q')]). '">'.$i.'</a></li>';
                    }            
                    else  {
                        echo '<li class="page-item"><a class="page-link" href="' . route('search',['page'=>$i,'q'=>Request::get('q')]). '">'.$i.'</a></li>';
                    }
                  }  
                  @endphp
              </ul>
            </nav>
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
     @if(Auth::check())
      <style>
      section#table tr:nth-child(n + 3) {
          filter: none !important;
      }
      </style>
     @endif
@endpush
@push('js')
@endpush

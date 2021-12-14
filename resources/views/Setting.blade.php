@extends('layouts.app')
@section('content')
    <!-- Setting Page -->
    <section id="setting">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="sidemenu" id="rborder">
              <h2>Settings</h2>
              <ul>
                <li>
                  <a class="sideactive" href="#subscription">Subscription</a>
                </li>
                <li style="list-style: none">
                  <a href="{{route('profile')}}">Personal info</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-10">
            <div id="subscription">
              <div class="swiper card-slider">
                <h4>Plan</h4>
                <div class="swiper-wrapper">
                   @foreach($plans as $key => $plan)
                      <div class="swiper-slide slide">
                        <div class="card">
                          <div class="card-body">
                            <div class="contents">
                              <h5 class="card-title">{{$plan->title}}</h5>
                              <div class="price">
                              <h5 class="card-title">$ {{$plan->monthly}} /Monthly</h5>
                              <h5 class="card-title">$ {{$plan->yearly}} /Yearly</h5>
                              </div>
                            </div>
                            <small class="day-remaining">{{$plan->property }} Properties can be views </small>
                            <div class="upgrade-contents">
                              <a class="btn planModal" data-id="{{$plan->id}}" href="javascript:void(0)">Upgrade</a>
                            </div>
                          </div>
                        </div>
                      </div>
                   @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
            </div>
            <div class="billing">
              <h4>Billing History</h4>
              <table class="table table-borderless">
                <thead class="table-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Details</th>
                    <th scope="col">Subscription Date</th>
                    <th scope="col">Expiary Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Download</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Mukesh Kumar</td>
                    <td>Starter plan, Monthly</td>
                    <td>01-01-2021</td>
                    <td>01-01-2022</td>
                    <td>$299</td>
                    <td><a href="#">Invoice Nov 25, 2021</a></td>
                  </tr>
                  <tr>
                    <td>Mukesh Kumar</td>
                    <td>Starter plan, Monthly</td>
                    <td>01-01-2021</td>
                    <td>01-01-2022</td>
                    <td>$299</td>
                    <td><a href="#">Invoice Nov 25, 2021</a></td>
                  </tr>
                  <tr>
                    <td>Mukesh Kumar</td>
                    <td>Starter plan, Monthly</td>
                    <td>01-01-2021</td>
                    <td>01-01-2022</td>
                    <td>$299</td>
                    <td><a href="#">Invoice Nov 25, 2021</a></td>
                  </tr>
                  <tr>
                    <td>Mukesh Kumar</td>
                    <td>Starter plan, Monthly</td>
                    <td>01-01-2021</td>
                    <td>01-01-2022</td>
                    <td>$299</td>
                    <td><a href="#">Invoice Nov 25, 2021</a></td>
                  </tr>
                  <tr>
                    <td>Mukesh Kumar</td>
                    <td>Starter plan, Monthly</td>
                    <td>01-01-2021</td>
                    <td>01-01-2022</td>
                    <td>$299</td>
                    <td><a href="#">Invoice Nov 25, 2021</a></td>
                  </tr>
                  <tr>
                    <td>Mukesh Kumar</td>
                    <td>Starter plan, Monthly</td>
                    <td>01-01-2021</td>
                    <td>01-01-2022</td>
                    <td>$299</td>
                    <td><a href="#">Invoice Nov 25, 2021</a></td>
                  </tr>
                  <tr>
                    <td>Mukesh Kumar</td>
                    <td>Starter plan, Monthly</td>
                    <td>01-01-2021</td>
                    <td>01-01-2022</td>
                    <td>$299</td>
                    <td><a href="#">Invoice Nov 25, 2021</a></td>
                  </tr>
                  <tr>
                    <td>Mukesh Kumar</td>
                    <td>Starter plan, Monthly</td>
                    <td>01-01-2021</td>
                    <td>01-01-2022</td>
                    <td>$299</td>
                    <td><a href="#">Invoice Nov 25, 2021</a></td>
                  </tr>
                  <tr>
                    <td>Mukesh Kumar</td>
                    <td>Starter plan, Monthly</td>
                    <td>01-01-2021</td>
                    <td>01-01-2022</td>
                    <td>$299</td>
                    <td><a href="#">Invoice Nov 25, 2021</a></td>
                  </tr>
                  <tr>
                    <td>Mukesh Kumar</td>
                    <td>Starter plan, Monthly</td>
                    <td>01-01-2021</td>
                    <td>01-01-2022</td>
                    <td>$299</td>
                    <td><a href="#">Invoice Nov 25, 2021</a></td>
                  </tr>
                  <tr>
                    <td>Mukesh Kumar</td>
                    <td>Starter plan, Monthly</td>
                    <td>01-01-2021</td>
                    <td>01-01-2022</td>
                    <td>$299</td>
                    <td><a href="#">Invoice Nov 25, 2021</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- modal -->

        </div>
      </div>
<div class="modal fade" id="planModal" tabindex="-1" aria-labelledby="planModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="planModalLabel">Changing Plan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <form action="{{route('subscribePlan')}}" method="GET">
          <div class="modal-body">
              <p style="color:#000" id="property"></p>
                  @csrf
                  <input type="hidden" id="plan_id" name="plan_id" value="" />
                  <div class="form-group">
                    <label>
                      <input type="radio" name="interval" value="monthly" checked/> $<b id="monthly"></b> /Monthly
                      <input type="radio" name="interval" value="yearly" />  $<b id="yearly"></b> /Yearly
                    </label>
                  </div>  
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Proceed</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>   
    </div>
  </div>
</div>
    </section>
@endsection
@push('js')
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      var plans = @json($plans);
      console.log(plans);
    </script>
    <script>
      var swiper = new Swiper(".card-slider", {
        centeredSlides: false,
        loop: true,
        spaceBetween: 20,
        autoplay: {
          delay: 9500,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          450: {
            slidesPerView: 2,
          },
          768: {
            slidesPerView: 2,
          },
          1200: {
            slidesPerView: 3,
          },
        },
      });
    </script>
    <script>
      $('.planModal').on('click',function(e){
          let planId = $(this).data('id');
          let modal  = $('#planModal');
          let plan   = plans.find(function(plan){
                return plan.id == planId;
          });
          modal.find('#property').text(plan.property + ' Property can be accessible');
          modal.find('#plan_id').val(plan.unique_id);
          modal.find('#planModalLabel').text(plan.title);
          modal.find('#monthly').text(plan.monthly);
          modal.find('#yearly').text(plan.yearly);
          modal.modal('show');
      });
    </script>
@endpush

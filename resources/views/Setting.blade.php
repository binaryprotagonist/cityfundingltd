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
                  <a href="personal.html">Personal info</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-10">
            <div id="subscription">
              <div class="swiper card-slider">
                <h4>Plan</h4>
                <div class="swiper-wrapper">
                  <div class="swiper-slide slide">
                    <div class="card" id="remain">
                      <div class="card-body">
                        <div class="contents">
                          <h5 class="card-title">Free</h5>
                          <h5 class="card-title">$10/month</h5>
                        </div>
                        <small>36 days remaining</small>
                        <a href="#" class="btn btn-borderd"
                          >Cancel Subscription</a
                        >
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide slide">
                    <div class="card">
                      <div class="card-body">
                        <div class="contents">
                          <h5 class="card-title">Starter</h5>
                          <h5 class="card-title">$10/month</h5>
                        </div>
                        <small class="day-remaining">365 days</small>
                        <div class="upgrade-contents">
                          <a class="btn" href="#">Upgrade</a>
                          <a href="#">Learn about this plan</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide slide">
                    <div class="card">
                      <div class="card-body">
                        <div class="contents">
                          <h5 class="card-title">Starter</h5>
                          <h5 class="card-title">$10/month</h5>
                        </div>
                        <small class="day-remaining">365 days </small>
                        <div class="upgrade-contents">
                          <a class="btn" href="#">Upgrade</a>
                          <a href="#">Learn about this plan</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide slide">
                    <div class="card">
                      <div class="card-body">
                        <div class="contents">
                          <h5 class="card-title">Starter</h5>
                          <h5 class="card-title">$10/month</h5>
                        </div>
                        <small class="day-remaining">365 days </small>
                        <div class="upgrade-contents">
                          <a class="btn" href="#">Upgrade</a>
                          <a href="#">Learn about this plan</a>
                        </div>
                      </div>
                    </div>
                  </div>
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
        </div>
      </div>
    </section>
@endsection
@push('css')

@push('js')
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
@endpush

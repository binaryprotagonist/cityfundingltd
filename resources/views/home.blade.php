<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Home</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light p-4">
      <div class="container">
        <a class="navbar-brand" href="index.html">Logo</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a
                class="nav-link home"
                aria-current="page"
                href="portfoliopage.html"
                >See your portfolio</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Setting.html"
                ><i class="fa fa-cog"></i
              ></a>
            </li>
            <li class="nav-item">
              <div class="dropdown" id="headprofile">
                <a
                  class="d-inline-flex py-0 align-items-center"
                  type="button"
                  id="dropdownMenuButton1"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <img
                    class="img-profile rounded-circle"
                    src="images/avtar.png"
                  />
                  <div class="profile-details d-lg-inline mr-2 text-right">
                    <div class="fullname">Mukesh Kumar Singh</div>
                    <div class="mail">
                      <small> abc@braininventory.com</small>
                    </div>
                  </div>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="Login.html">Login</a></li>
                  <li><a class="dropdown-item" href="Login.html">Logout</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
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
          <form action="{{route('search')}}">
            <p class="mb-3">Search Company Name:</p>
            <div class="input-group">
              <input
                type="text"
                class="form-control"
                placeholder="search"
                name="search"
              />
              <button class="btn btn-default" type="submit">
                Search <i class="fa fa-search"></i>
              </button>
              <a class="filterlink" href="portfoliofilter.html">
                Search <i class="fa fa-search"></i
              ></a>
            </div>
          </form>
        </div>
      </div>
    </section>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

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
    <title>Portfolio Page</title>
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
              <a class="nav-link home" aria-current="page" href="home.html"
                >Back to Home</a
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
    <!-- Portfolio Page -->
    <section id="portfoliopage">
      <div class="container">
        <div class="wrapper">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Company Name</th>
                <th scope="col">Date of creation</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Bharti Airtel Limited</td>
                <td>Nov 25,2021</td>

                <td>
                  <a href="Portfoliohistory.html"
                    ><img src="images/view.png"
                  /></a>
                </td>
              </tr>
              <tr>
                <td>Reliance Jio Infocomm Limited</td>
                <td>Nov 25,2021</td>
                <td>
                  <a href="Portfoliohistory.html"
                    ><img src="images/view.png"
                  /></a>
                </td>
              </tr>
              <tr>
                <td>Ashok Leyland</td>
                <td>Nov 25,2021</td>
                <td>
                  <a href="Portfoliohistory.html"
                    ><img src="images/view.png"
                  /></a>
                </td>
              </tr>
              <tr>
                <td>Tata Motors Group</td>
                <td>Nov 25,2021</td>
                <td>
                  <a href="Portfoliohistory.html"
                    ><img src="images/view.png"
                  /></a>
                </td>
              </tr>
              <tr>
                <td>Aditya Birla Management Corporation Ltd</td>
                <td>Nov 25,2021</td>
                <td>
                  <a href="Portfoliohistory.html"
                    ><img src="images/view.png"
                  /></a>
                </td>
              </tr>
              <tr>
                <td>One97 Communications</td>
                <td>Nov 25,2021</td>
                <td>
                  <a href="Portfoliohistory.html"
                    ><img src="images/view.png"
                  /></a>
                </td>
              </tr>
              <tr>
                <td>Bharti Airtel Limited</td>
                <td>Nov 25,2021</td>
                <td>
                  <a href="Portfoliohistory.html"
                    ><img src="images/view.png"
                  /></a>
                </td>
              </tr>
              <tr>
                <td>Reliance Jio Infocomm Limited</td>
                <td>Nov 25,2021</td>
                <td>
                  <a href="Portfoliohistory.html"
                    ><img src="images/view.png"
                  /></a>
                </td>
              </tr>
              <tr>
                <td>Ashok Leyland</td>
                <td>Nov 25,2021</td>
                <td>
                  <a href="Portfoliohistory.html"
                    ><img src="images/view.png"
                  /></a>
                </td>
              </tr>
              <tr>
                <td>Tata Motors Group</td>
                <td>Nov 25,2021</td>
                <td>
                  <a href="Portfoliohistory.html"
                    ><img src="images/view.png"
                  /></a>
                </td>
              </tr>
              <tr>
                <td>Aditya Birla Management Corporation Ltd</td>
                <td>Nov 25,2021</td>
                <td>
                  <a href="Portfoliohistory.html"
                    ><img src="images/view.png"
                  /></a>
                </td>
              </tr>
              <tr>
                <td>One97 Communications</td>
                <td>Nov 25,2021</td>
                <td>
                  <a href="Portfoliohistory.html"
                    ><img src="images/view.png"
                  /></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

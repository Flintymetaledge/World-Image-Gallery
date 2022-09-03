<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    />
    <link
      rel="stylesheet"
      href="/assets/CSS/custom.css"
    />
  </head>
  <body class='bg-secondary '>
    <!-- navbar start -->
    <nav class="navbar navbar-expand-md bg-dark border-bottom">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">World Image Gallery</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="#navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="btn btn-success my-2" aria-current="page" href="/upload">
                + Upload
              </a>
            </li>
          </ul>
          <form action='/search' method='GET' class="d-flex my-2 mx-auto" role="search">
            <input
              class="form-control me-2"
              type="search"
              name='query'
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
          <ul class="navbar-nav ms-auto">
            <!-- checks if user is logged in and changes banner buttons to My profile and Log Out else buttons display as sign in and sign up-->
          <?php if (isset($_SESSION['userId'])) { ?>
            <li class="nav-item my-2 mx-1">
              <a class="btn btn-success" href="/user" >
                My Profile
              </a>
            </li>
            <li class="nav-item my-2 mx-1">
              <a class="btn btn-warning" href="/user/logout">
                Log Out
              </a>
            </li>
          <?php } else { ?>
            <li class="nav-item my-2 mx-1">
              <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#SigninModal" href="#">
                Sign in
              </a>
            </li>
            <li class="nav-item my-2 mx-1">
              <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#SignupModal" href="#">
                Sign up
              </a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- navbar end -->
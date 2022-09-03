    <!-- Modal Start -->
    <!-- Sign in modal -->
    <div class="modal" id="SigninModal" tabindex="-1">
      <div class="modal-dialog">
        <form action="user/login" method='POST'>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Sign In</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Username/email</label>
                <input type="email" required name = 'email' class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" required name='password'class="form-control" />
              </div>
              <div class="form-group">
                <label for="remember">
                  <input type="checkbox" id="remember" />
                  Remember me
                </label>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="submit"
                class="btn btn-primary"
                data-bs-dismiss="modal"
              >
                Sign in
              </button>
              <button
                type="button"
                class="btn btn-info"
                data-bs-toggle="modal"
                data-bs-target="#SignupModal"
              >
                Sign up
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- sign up modal -->
    <div class="modal" id="SignupModal" tabindex="-1">
      <div class="modal-dialog">
        <form action="/user/register" method = 'POST'>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Sign In</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <label for="">UserName</label>
                <input type="text" required name="userName" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">email</label>
                <input type="email" required name="email" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" required name='password' class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" required name='repeatPassword' class="form-control" />
              </div>
              <div class="form-group">
                <label for="remember">
                  <input type="checkbox" required id="remember" />
                  Agree to Terms of Use
                </label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-info" >
                Create Account
              </button>
              <button
                type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#SigninModal"
              >
                Sign in
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- Modal End -->

    <!-- Java Script Start -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
    <script src="/assets/js/script.js"></script>
    <!-- Java Script End -->
  </body>
</html>
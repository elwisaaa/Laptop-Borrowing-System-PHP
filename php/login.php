<html>
<?php

include 'navbar.php';

?>

<head></head>
<title>Log In</title>
<script src="../js/fade.js"></script>
<link rel="stylesheet" type="text/css" href="../css/stylelogin.css">
<body>
  <section class="h-100">
    <div class="container h-100">
      <div class="row justify-content-sm-center h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
          <div class="text-center my-5">
          </div>
          <div class="card shadow-lg">
            <div class="card-body p-5">
              <h1 style="text-align: center;" class="fs-4 card-title fw-bold mb-4">Login</h1>
              <form action="loginprocess.php" method="POST">
                <div class="mb-3">
                  <label class="mb-2 text-muted" for="email">Email </label>
                  <input id="email" type="email" class="form-control" name="email" placeholder="Enter your email" required>
                </div>

                <div class="mb-3">
                  <div class="mb-2 w-100">
                    <label class="text-muted" for="password">Password</label>
                  </div>
                  <input id="passwd" type="password" class="form-control" name="pass" placeholder="Enter your password">
                </div>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onclick="showPass()">
                  <label class="form-check-label" for="flexSwitchCheckDefault">Show password</label>
                </div>
                <div class="d-flex align-items-center">
                  <button type="submit" class="btn btn-primary ms-auto">
                    Login
                  </button>
                </div>
              </form>
            </div>
            <div class="card-footer py-3 border-0">

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
<script type="text/javascript">
  function showPass() {
    var x = document.getElementById("passwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  }
</script>
</html>

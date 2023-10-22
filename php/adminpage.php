<!doctype html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap@5.0.2.min.css">
  <script src="../js/bootstrap@5.0.2.bundle.min.js"></script>
  <script src="../js/jquery-3.6.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">

  <?php
  //include connection to database
  include 'connection.php';

  //Prevent direct access using session
  session_start();
  if ($_SESSION['admin'] == true) {
    $_SESSION['loggedin'] = true;
  }
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

  } else {
    header("location: badaccess.php");
  }
  $resultlaptop = mysqli_query($conn, "SELECT * FROM laptop ORDER BY LENGTH(laptop_id), laptop_id");

  if (mysqli_num_rows($resultlaptop) > 0) {
    ?>
    <meta charset="utf-8">
    <link rel="icon" href="../assets/icon.svg">
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="../css/styleindex.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
    <link rel="icon" href="./assets/icon.svg">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">e-Records</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="list.php">List of laptops</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Log In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-9">
            <h3 class="h3-head">Welcome to Admin Panel</h3>
          </div>
          <div class="col-9-below">
            <div class="container-below">
              <h3 class="h3-body">Laptop Database</h3>
            </div>
            <div class="container-below">
              <button type="button" class="btn btn-primary btn-l" onclick="showmodal()">Add a laptop</button>
            </div>
          </div>
          <div class="col-9" style="margin-top:3%;">
            <div class="table-container table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Laptop ID</th>
                    <th>Laptop Name</th>
                    <th>Availability</th>
                    <th>Set availability</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($resultlaptop)) { ?>
                    <tr>
                      <td>
                        <?php echo $row['laptop_id']; ?>
                      </td>
                      <td>
                        <?php echo $row['laptop_name']; ?>
                      </td>
                      <td>
                        <?php
                        $isavailable = $row['isAvailable'];
                        if (strcmp($isavailable, "Y") == 0) {
                          echo "<img src='../assets/tick.png' class='availimg'>";
                        } else {
                          echo "<img src='../assets/cancel.png' class='availimg'>";
                        }
                        ?>
                      </td>
                      <td><button id="<?php echo $row['laptop_id'] ?>" onclick="toggleavail(this)"
                          class="btn btn-primary">Toggle Availability</button></td>
                      <td><button id="<?php echo $row['laptop_id'] ?>" onclick="deleteLaptop(this)"
                          class="btn btn-primary">Delete</button></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            <?php } ?>
          </div>
        </div>
        <div class="col-9-below">
          <div class="container-below">
            <?php
            $resultborrow = mysqli_query($conn, "SELECT 
                *, DATE_FORMAT(borrow_end,'%d-%m-%Y') as formatted_date
              FROM `borrow` ORDER BY borrow_start ASC");
            if (mysqli_num_rows($resultborrow) > 0) {
              ?>
              <h3 class="h3-body">Borrowing Database</h3>
            </div>
          </div>
          <div class="col-9">
            <div class="table-container table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>IC No</th>
                    <th>Username</th>
                    <th>Laptop ID</th>
                    <th>Borrowed Date</th>
                    <th>Borrowed End</th>
                    <th>Purpose</th>
                    <th>Set date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  while ($row = mysqli_fetch_assoc($resultborrow)) { ?>
                    <tr>
                      <td>
                        <?php echo $row['user_id']; ?>
                      </td>
                      <td>
                        <?php echo $row['user_name']; ?>
                      </td>
                      <td>
                        <?php echo $row['laptop_id']; ?>
                      </td>
                      <td>
                        <?php echo $row['borrow_start']; ?>
                      </td>
                      <td>
                        <?php echo $row['borrow_end']; ?>
                      </td>
                      <td>
                        <?php echo $row['borrow_purpose']; ?>
                      </td>
                      <td><button id="<?php echo $row['borrow_id'] ?>" onclick="setsend(this)"
                          class="btn btn-primary">Received</button></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            <?php } ?>
          </div>
        </div>
        <div class="col-9-below">
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="modal fade" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Enter the new laptop info</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="">
            <div class="form-group">
              <label>Laptop ID</label><br>
              <input id="idlaptop" type="text" class="form-control" placeholder="Laptop ID." required>
              <label>Laptop Name</label><br>
              <input id="laptopname" type="text" class="form-control" placeholder="Laptop name" required>
              <label>Laptop Image</label><br><br>
              <input type="file" id="image">
              <div class="modal-button">
                <button onclick="addLaptop()" id="borrow" type="button" class="btnmodal">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<script>
  function showmodal() {
    console.log("clicked");
    $('#modal').modal('show');
  }
  $(function () {
    $('body').hide().fadeIn('slow');

  });
  function setsend(button) {
    var borrowid = button.id;
    if (confirm("Set the date to today ?") == true) {
      $.ajax({
        url: 'setsend.php',
        type: 'POST',
        data: { borrowid: borrowid },
        success: function (sended) {
          if (sended.toggled) {
            window.location.replace("adminpage.php");
          } else {
            alert("Error set date !!");
          }
        }
      });
    }
    else {
      alert("Cancelled !")
    }

  }
  function toggleavail(button) {
    var togglebtn = button.id;
    $.ajax({
      url: 'toggleavail.php',
      type: 'POST',
      data: { togglebtn: togglebtn },
      success: function (response) {
        if (response.toggled) {
          window.location.replace("adminpage.php");
        } else {
          alert("Error set availability !!");
        }

      }
    });
  }
  function addLaptop() {
    if ($("#idlaptop").val() && $("#laptopname").val() && $("#image")[0].files[0]) {
      var idlaptop = $("#idlaptop").val();
      var laptopname = $("#laptopname").val();
      var image = $("#image")[0].files[0];

      // Check file type
      var fileType = image.type;
      if (fileType === "image/jpeg" || fileType === "image/jpg" || fileType === "image/png") {
        var formData = new FormData();
        formData.append("idlaptop", idlaptop);
        formData.append("laptopname", laptopname);
        formData.append("image", image);

        $.ajax({
          type: 'POST',
          data: formData,
          url: 'addlaptop.php',
          processData: false,
          contentType: false,
          success: function (response) {
            if (response.success) {
              alert("Successfully added a laptop");
              location.reload();
            } else {
              if (response.message) {
                alert(response.message);
              } else {
                alert("Failed");
              }
            }
          }
        });
      } else {
        alert("Please select a JPG,JPEG,PNG image.");
      }
    } else {
      alert("Please insert data and select an image.");
    }
  }
  function deleteLaptop(button) {
    var laptopid = button.id;
    if (confirm("Are you sure want to delete this laptop ?") == true) {
      $.ajax({
        url: 'deletelaptop.php',
        type: 'POST',
        data: { laptopid: laptopid },
        success: function (deleted) {
          if (deleted.success) {
            alert("Laptop deleted !!");
            window.location.replace("adminpage.php");
          } else {
            alert("Error delete laptop !!");
          }
        }
      });
    }
    else {
      alert("Cancelled !")
    }
  }

</script>
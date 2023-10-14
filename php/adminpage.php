<!doctype html>
<html>
  <head>
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
    $resultlaptop = mysqli_query($conn, "SELECT * FROM laptop");
    
    if (mysqli_num_rows($resultlaptop) > 0) {
    ?>
    <meta charset="utf-8">
    <link rel="icon" href="../assets/icon.svg">
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="../css/styleindex.css">
    <script src="../js/jquery-3.6.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="./assets/icon.svg">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap@5.0.2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">e-Records</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
          </div>
          <div class="col-9">
          <div class="table-container table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Laptop ID</th>
                    <th>Laptop Name</th>
                    <th>Availability</th>
                    <th>Set availability</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($resultlaptop)){?>
                  <tr>
                    <td><?php echo $row['laptop_id'];?></td>
                    <td><?php echo $row['laptop_name'];?></td>
                    <td>
                      <?php 
                        $isavailable = $row['isAvailable'];
                        if(strcmp($isavailable, "Y") == 0)
                        {
                          echo "<img src='../assets/tick.png' class='availimg'>";
                        }
                        else
                        {
                          echo "<img src='../assets/cancel.png' class='availimg'>";
                        }
                      ?>
                    </td>
                    <td><button id="<?php echo $row['laptop_id']?>" onclick="toggleavail(this)" class="btn btn-primary">Toggle Availability</button></td>
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
                
                while($row = mysqli_fetch_assoc($resultborrow)){?>
                  <tr>
                    <td><?php echo $row['user_id'];?></td>
                    <td><?php echo $row['user_name'];?></td>
                    <td><?php echo $row['laptop_id'];?></td>
                    <td><?php echo $row['borrow_start'];?></td>
                    <td><?php echo $row['borrow_end'];?></td>
                    <td><?php echo $row['borrow_purpose'];?></td> 
                    <td><button id="<?php echo $row['borrow_id']?>"onclick="setsend(this)" class="btn btn-primary">Received</button></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php } ?>
            </div>
          </div>
          <div class="col-9-below">
          </div>
          <div class="col-9">
            <div class="container-below">
              <h3 class="h3-body">Most borrowed laptop</h3>
            </div>
            <div class="col">
               <div class="chart">
                  <div id="firstchart"></div>
               </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script>
  $(function() {
    $('body').hide().fadeIn('slow');
    
    });
  function setsend(button)
    {
       var borrowid = button.id;
       if(confirm("Set the date to today ?") == true){
        $.ajax({
          url: 'setsend.php',
          type: 'POST',
          data: { borrowid: borrowid},
          success: function(sended) {
            if (sended.toggled){
                window.location.replace("adminpage.php");
            } else {
                alert("Error set date !!");
            }            
          }
       });
       }
       else{
        alert("Cancelled !")
       }
       
    }
    function toggleavail(button)
    {
       var togglebtn = button.id;
       $.ajax({
          url: 'toggleavail.php',
          type: 'POST',
          data: { togglebtn: togglebtn},
          success: function(response) {
            if (response.toggled){
                window.location.replace("adminpage.php");
            } else {
                alert("Error set availability !!");
            }
            
          }
       });
    }
var options = {
  chart: {
    type: 'bar'
  },
  series: [{
    name: 'sales',
    data: [30,40,45,50,49,60,70,91,125]
  }],
  xaxis: {
    categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
  }
}

var chart = new ApexCharts(document.querySelector("#firstchart"), options);

chart.render();
</script>
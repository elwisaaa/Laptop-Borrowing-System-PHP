<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Laptop Borrowing System</title>
      <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel="icon" href="./assets/icon.svg">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/styleindex.css">
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light">
         <div class="container-fluid">
            <a class="navbar-brand" href="index.php">e-Records</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="./php/list.php">List of laptops</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="./php/login.php">Log In</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div id="carouselExampleInterval" class="carousel slide carousel-fade carousel-dark slide" data-bs-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
               <img src="./assets/imgtest1.jpg" class="img-fluid" alt="Responsive image">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
               <img src="./assets/imgtest2.jpg" class="img-fluid" alt="Responsive image">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
               <img src="./assets/imgtest3.jpeg" class="img-fluid" alt="Responsive image">
            </div>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
         </button>
      </div>
      <footer class="text-center text-lg-start bg-light text-muted">
         <div class="text-center p-2">
            © 2022 :
            <a style="text-decoration:none;"class="text-reset fw-bold" href="www.facebook.com/hospitaljelikelantan">Unit ICT Hospital Jeli</a>
         </div>
      </footer>
   </body>
   <script>
    $(function() {
$('body').hide().fadeIn('slow');

});


   </script>
</html>
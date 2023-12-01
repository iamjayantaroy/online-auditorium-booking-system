<?php
session_start();
if(!(isset($_SESSION['id'])))
{
  header("location:http://127.0.0.1/Project/User/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    
  </head>

  <body>
    <!-- As a link -->
    <nav class="navbar" style="padding: 0px;">
      <div class="logo" > <a href="index.php"><img src="logo.png" alt="" srcset=""></a></div>
      <div class="title">Admin Panel</div>
      <div class="about"><a href="http://127.0.0.1/Project/User/frontpage/logout.php"><button class="buy-btn">Log Out</button></a></div>

    </nav>
   
    <main>
      <div class="container">
        <div class="card shadow p-3 mb-5 bg-white rounded">
          <img src="images/user.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">User Details</h5>
            <a href="user.php" class="btn btn-warning">Click Here</a>
          </div>
        </div>
        <div class="card shadow p-3 mb-5 bg-white rounded">
          <img src="images/auditorum.png" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">Add Auditorium</h5>
            <a href="auditorium_list.php" class="btn btn-warning">Click Here</a>
          </div>
        </div>

        <div class="card shadow p-3 mb-5 bg-white rounded">
          <img src="images/booking.png" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">Booked Auditorium</h5>
            <a href="booked.php" class="btn btn-warning">Click Here</a>
          </div>
        </div>
        <div class="card shadow p-3 mb-5 bg-white rounded">
          <img src="images/contact.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">Contact Us</h5>
            <a href="contact.php" class="btn btn-warning">Click Here</a>
          </div>
        </div>
      </div>
    </main>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

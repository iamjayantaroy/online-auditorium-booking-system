<?php
require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Document</title>
    <style>
       .navbar{
    
    height: 12vh;
    background-color: #252B48;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0px;
    box-shadow: 0px 5px 5px rgb(176, 176, 176);
    
}
.navbar div{
    display: flex;
    align-items: center;
    justify-content: center;
    width: fit-content;
    height: inherit;
    margin-left: 15px;
    margin-right: 15px;
}
.navbar div img{
    width: 250px;
    height: 110px;
    background-size: cover;
    padding-bottom: 10px;
}
.navbar div button{
    padding: 7px 20px;
    font-size: 18px;
    font-weight: 400;
    background-color: #ffc107;
    color: black;
    border-radius: 5px;
    outline: none;
    border: none;
}
.navbar .title{
    font-size: 50px;
    font-weight: 600;
    color: #ffffff;
} 

thead th{
    background-color: #252B48 !important; 
    color: #ffffff !important;
}
    </style>
</head>

<body class="bg-light">

<nav class="navbar" style="padding: 0px;">
      <div class="logo" > <a href="index.php"><img src="logo.png" alt="" srcset=""></a></div>
      <div class="title">Admin Panel</div>
      <div class="about"><a href="http://127.0.0.1/Project/User/frontpage/logout.php"><button class="buy-btn">Log Out</button></a></div>

    </nav>
    <!-- auditorium add section -->
    
 <div class="container  text-light p-3 rounded my-5 mt-5"  style="background-color: #252B48;">
    <div class="d-flex align-items-center justify-content-center px-3">
        <h2>User Details</h2>
        
    </div>
 </div>

 <div class="container mt-5">
    <table class="table table-hover text-center table-bordered">
         <thead  style="background-color:#252B48">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">User Id</th>
      <th scope="col">Name</th>
      <th scope="col">Phone No</th>
      <th scope="col">Password</th>
      
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
    $query = "SELECT * FROM `user details` where `usertype` = 'user'";
    $result = mysqli_query($conn,$query);
    $i = 1;
    $fetch_src = fetch_src;
    while($fetch = mysqli_fetch_assoc($result)){
        echo<<<auditorium
        <tr class="align-middle">
          <th scope="row">$i</th>
          <td>$fetch[id]</td>
          <td>$fetch[name]</td>
          <td>$fetch[mobile]</td>
          <td>$fetch[password]</td>
        </tr>
        auditorium;
        $i++;
    }
    ?>
    
    
  </tbody>
    </table>
</div>
</body>
</html>
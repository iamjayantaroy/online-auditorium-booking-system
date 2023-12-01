<html>
<head>
    <link rel="stylesheet" href="style.css">
    
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<style>
    body{
        height: 100vh;
    }
    .table{
        width: 100%;
        height: 50vh;
        padding: 50px;
        display: flex;
        align-items: center;
        justify-content: center;

    }
   
    th{
        font-size: larger;
        padding: 15px 60px;
        background-color: #252B48;
        color: white;
    }
    td{
        
        text-align: center;
        padding: 15px 60px;
        background-color:#d3d6db;
        color: #252B48;
        font-weight: 600;   
    }
    td:nth-child(5){
        color: green;
    }
</style> 
</head>
<body style="height: 100vh">
<div class="navbar1">
<div class="logo">
    
        <img src="logo.png" onclick="window.location.href='http://127.0.0.1/Project/User/frontpage/index.php'"> 
    
</div>

<div class="searchbox">
<input type="text" id="input" placeholder="Search...." class="input" value=""> 
<div class="icon" onclick="search()"> 
<button class="search-icon darkmode" ><i class="fa-solid fa-magnifying-glass"  ></i></button>
</div>
</div>
<div class="location" onclick="userlocation()">
<ul>
<li>
<a>
<div class="lo-icon">
<ion-icon name="location-outline" style="font-size: 30px;"></ion-icon>
</div>
<div class="text" style="font-weight: 700;" >
Near Me
</div>
</a>
</li>
</ul>
</div>

</div>

<div class="navbar">

<ul>
<button class="darkmode" onclick="change()" ><i class="fa-solid fa-moon" id="icon" style="color: black; padding: 0px 30px;"></i></button><!-- <i class="fa-solid fa-sun"></i> -->
<div class="navoption">
<a href="index.php">Home</a></div>
<div class="navoption">
<a href="http://127.0.0.1/Project/User/contact_us/index.php">Contact us</a></div>

<div class="navoption" >
<a href="wishlist.php">Wishlist</a></div>

<div class="dropdown" onclick="myFunction()">

<button  class="drop-btn" >Profile</button>
<div id="mylist" class="list">
<a href="">Recent Booking</a>
<a href="logout.php">Log out</a>
</div>
</div>


</ul> 
</div>

<div class="heading">
<p><span>WELCOME</span></p>
<h1>My Bookings</h1>   
</div>

 
<div class="table">
       <?php
    session_start();
    require("connection.php");
    if(!(isset($_SESSION['id']))){
        header("location:http://127.0.0.1/Project/User/login.php");
    }
    $user = $_SESSION['id'];
    $query = "SELECT * FROM `auditorium details` a inner join `payment` p 
    ON a.id =p.auditoriumid where p.userid= '$user' and p.is_success='1'";

    $result = mysqli_query($conn,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==0)
        {?>
            <div class="empty" style="display: flex;align-items:center;justify-content:center;flex-direction:column;gap:20px">
                
                <img src="book.png" style="margin-top:20px;height:auto;width:90vh">
                <h1 style="color: #252B48;">Your Booking List Is Empty</h1>
            
            </div>
            
        <?php }
        else{  
?>
<table>
  <thead>
    <tr>
      <th scope="col">Auditorium Name</th>
      <th scope="col">Booking Date</th>
      <th scope="col">Booing Id</th>
      <th scope="col">Amount</th>
      <th scope="col">Payment Status</th>
    </tr>
  </thead>
  <tbody>
  <?php  
  while($fetch = mysqli_fetch_assoc($result))
    {?>
    <tr>
      <td><?php echo $fetch['name'] ?></td>
      <td><?php echo $fetch['date'] ?></td>
      <td><?php echo $fetch['razorpay_id'] ?></td>
      <td><?php echo $fetch['amount'] ?></td>
      <td>Completed</td>
    </tr>
   <?php } ?>
    
  </tbody>
</table>

<?php }}?>
</div>
 <footer>
<div class="firstpanel">
<div class="firstpanel-logo">
<a href="#" ><img src="logo.png"></a>
</div>
<div class="firstpanel-text">
<p>Where Booking Is As Easy As 1-2-3!</p>
</div>
</div>

<div class="secpanel">
<div class="media-icon">
<a href=""> <i class="fa-brands fa-facebook-f"></i></a>
<a href="">  <i class="fa-brands fa-twitter"></i></a>
<a href="">  <i class="fa-brands fa-instagram"></i></a>
<a href="">  <i class="fa-brands fa-youtube"></i></a>
</div>
<div class="secpanel-text">
<a href="">About Us</a>
<a href="">Get To Know Us</a>
<a href="">Terms And Conditions</a>
<a href="">Privacy policy</a>
<a href="">Security</a>
</div>
<div class="secpanel-text">
<a href="http://127.0.0.1/Project/User/faq/index.php">Helps</a>
<a href="http://127.0.0.1/Project/User/contact_us/index.php">Contact Us</a>
<a href="http://127.0.0.1/Project/User/faq/index.php">Payment</a>
<a href="http://127.0.0.1/Project/User/faq/index.php">FAQ</a>
<a href="http://127.0.0.1/Project/User/faq/index.php">Cancellations</a>
</div>
</div>
 </footer>
</body>
<script>
    var input = document.getElementById("input");
input.addEventListener("keypress", function(event) {
  
  if (event.key === "Enter") {
    search();
  }
});
   </script>
<script src="script.js"></script>
</html>


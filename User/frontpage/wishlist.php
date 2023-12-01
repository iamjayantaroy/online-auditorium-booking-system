<html>
<head>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 
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
<a href="booking.php">Recent Booking</a>
<a href="logout.php">Log out</a>
</div>
</div>


</ul> 
</div>

<div class="heading">
<p><span>WELCOME</span></p>
<h1>My Wishlist</h1>   
</div>
 <div class="hero"> 

<?php
require("connection.php");
session_start();
if(!(isset($_SESSION['id'])))
{
    header("location:http://127.0.0.1/Project/User/login.php");
}
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $user = $_SESSION['id'];

    $query = "SELECT * from `wishlist` WHERE `userid`= '$user' AND `id`= '$id'";
    $result = mysqli_query($conn,$query);

    if($result){
        if(mysqli_num_rows($result) > 0){
            $fetch = mysqli_fetch_assoc($result);
            $query = " DELETE from `wishlist` WHERE `userid`= '$user' AND `id`= '$id'";
            $result = mysqli_query($conn,$query);
            header("location:$_SERVER[HTTP_REFERER]");
        }
        else{
            $query = "INSERT INTO `wishlist`(`userid`, `id`) VALUES ('$user','$id')" ;
            $result = mysqli_query($conn,$query);
            header("location:$_SERVER[HTTP_REFERER]");
        }
    }
}


$user = $_SESSION['id'];
$query = "SELECT * FROM `auditorium details` a inner join `wishlist` 
w ON a.id =w.id where w.userid= '$user'";

    $result = mysqli_query($conn,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==0)
        {?>
            <img src="wishlist.png" style="margin-top:20px">
        <?php }
        else{

        

   
    $fetch_src = fetch_src;
    while($fetch = mysqli_fetch_assoc($result))
    { ?>
        <div class="a container" >
<a href="#"><img src="<?php echo $fetch_src.$fetch['pimage'] ?>" onclick="mainpageshow(<?php echo $fetch['id'] ?>)"></a>
<a href="#"> <h3 style="margin: 5px;"><?php echo $fetch['name'] ?></h3></a>



<div class="remove" style="width:100%;margin-top:10px">
<a href="wishlist.php?id=<?php echo $fetch['id']?>">
<button style="width:100%;background-color:tomato; padding:15px;outline:none;border:none;color:white;border-radius:20px;font-size:15px">Remove From Wishlist</button>
</a>
</div>


</div> 
   <?php }}} ?>
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
</html>
    






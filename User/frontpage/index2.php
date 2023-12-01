<?php
session_start();
require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 
            
           <style>
            .book-now{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 10px;
            }
           </style>
</head>
<body>
   
    <header>
<div class="navbar1">
    <div class="logo">
       <img src="logo.png" onclick="window.location.href='http://127.0.0.1/Project/User/frontpage/index.php'"> 
    </div>
    
        <div class="searchbox">
            <input type="text" id="input" placeholder="Search...." class="input"> 
            <div class="icon"> 
                <button class="darkmode"><i class="fa-solid fa-magnifying-glass"  ></i></button>
                </div>
            </div>
          <div class="location" onclick="userlocation()">
         <ul>
            <li>
                <a href="#" >
                    <div class="lo-icon">
                <ion-icon name="location-outline" style="font-size: 30px;"></ion-icon>
            </div>
            <div class="text" style="font-weight: 700;">
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

   <div class="dropdown">
   <?php  
if(isset($_SESSION["id"])){
?>
<button  class="drop-btn" onclick="myFunction()">Profile</button>
<div id="mylist" class="list">
<a href="booking.php">Recent Booking</a>
<a href="logout.php">Log out</a>
</div>
</div>
<?php }
else
{?>
<button class="drop-btn" onclick="window.location.href = 'http://127.0.0.1/Project/User/login.php'">Login</button>
<?php } 
?>
   

</ul> 
</div>

</header>




<div class="hero">
  
<?php


$mysqli = new mysqli("localhost","root","","Auditorium");

if(isset($_GET['long']))
{
   $userLatitude = $_GET['lat']; 
   $userLongitude = $_GET['long'];
}




$query = "SELECT * FROM `auditorium details`";
$result = $mysqli->query($query);

// Step 4: Calculate the distance and store in an array
$fetch = array();
while ($row = $result->fetch_assoc()) {
    $distance = calculateDistance($userLatitude, $userLongitude, $row['latitude'], $row['longitude']);
    $fetch[] = array('distance' => $distance, 'name' => $row['name'], 
                'id' => $row['id'],'price' => $row['price'],'description' => $row['description'],
            'rating' => $row['rating'],'location' => $row['location'],'capacity' => $row['capacity'],
        'pimage' => $row['pimage'],'image2' => $row['image2'],'image3' => $row['image3'],
    'image4' => $row['image4'],'Slocation' => $row['Slocation']);
}


usort($fetch, function($a, $b) {
    return $a['distance'] - $b['distance'];
});

// Haversine formula
function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; 

    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);

    $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earthRadius * $c;

    return $distance;
} 

// Step 6: Display the sorted locations
foreach ($fetch as $fetch) {?>
    <!-- echo<<<container -->
        <div class="a container" >
            <a href="#"><img src="<?php echo "http://127.0.0.1/Project/image/".$fetch['pimage'] ?>" onclick="mainpageshow(<?php echo $fetch['id'] ?>)"></a>
            <a href="#"> <h3><?php echo $fetch['name'] ?></h3></a>
            
            <?php
if(isset($_SESSION['id'])){
  $query = "SELECT * from `wishlist` WHERE `userid`= '$_SESSION[id]' AND `id`= '$fetch[id]'";
    $fvrt = mysqli_query($conn,$query);
    if($fvrt)
    {
      if(mysqli_num_rows($fvrt)>0)
      { ?>
          <div class="fvrt">
          <!-- <ion-icon name="heart-outline"></ion-icon> -->
          <button class="button" ><a href="http://127.0.0.1/Project/User/frontpage/wishlist.php?id=<?php echo $fetch['id'] ?>"><ion-icon name="heart" id="heart"   style="color: red;font-size:25px;margin-top:2px"></ion-icon></a></button> 
          </div>
      <?php }
      else{
        ?>
          <div class="fvrt">
          <!-- <ion-icon name="heart-outline"></ion-icon> -->
          <button class="button" ><a href="http://127.0.0.1/Project/User/frontpage/wishlist.php?id=<?php echo $fetch['id'] ?>"><ion-icon name="heart-outline" id="heart"   style="color: white;font-size:25px;margin-top:2px"></ion-icon></a></button> 
          </div>
      <?php
      }
    }
}
else{ ?>
    <div class="fvrt">
    <!-- <ion-icon name="heart-outline"></ion-icon> -->
    <button class="button" ><ion-icon name="heart-outline" id="heart"  onclick="fvrt(this)" style="color: rgb(255, 255, 255);font-size:25px;margin-top:2px"></ion-icon></button> 
    </div> 
<?php }
    
?>

        
            <div class="ratings">
            <ul class="star">
            <span style="padding:3.5px 8px">
            <?php if($fetch['rating']<5) 
                    echo $fetch['rating'] . ".5";
                else
                echo "4.9";?>
            </span>
            <?php 
            $count = 1;
            while($count<=5){
                if($count<=$fetch['rating']){
                    ?>
                    <i class="fa-solid fa-star" style="color:#ffc107"></i>
                <?php }
                else {
                    ?>
                    <i class="fa-solid fa-star"></i>
                <?php }
                $count++;
            }
            ?>
            </ul>
            </div>

            <div class="info">
            <p><?php echo $fetch['Slocation']?></p>
            <span>Open until 9:00 pm</span>
            </div>
            <div class="book-now" >
            <h3 style="color:#fc7005;font-weight:600"><?php echo "₹" .$fetch['price']?><span>
            </span></h3>
            <button class="button-book" onclick="mainpageshow(<?php echo $fetch['id'] ?>)" style="background:#252B48;border-radius:2px;padding:12px 10px"><a href="#" style="color:#ffc107;font-size:16px;font-weight:600">BOOK NOW</a></button>
            </div>

        </div> 
<?php } ?>

    
    







   


</div>





</body>
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
          <a href="#"> <i class="fa-brands fa-facebook-f"></i></a>
          <a href="#">  <i class="fa-brands fa-twitter"></i></a>
          <a href="#">  <i class="fa-brands fa-instagram"></i></a>
          <a href="#">  <i class="fa-brands fa-youtube"></i></a>
        </div>
       <div class="secpanel-text">
       <a href="http://127.0.0.1/Project/User/about_us/index.php">About Us</a>
<a href="http://127.0.0.1/Project/User/about_us/index.php">Get To Know Us</a>
<a href="http://127.0.0.1/Project/User/terms_and_condition/index.php">Terms And Conditions</a>
<a href="http://127.0.0.1/Project/User/privacy_policy/index.php">Privacy policy</a>
<a href="http://127.0.0.1/Project/User/security/index.php">Security</a>
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
<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
    function fvrt(heart) {
    
    if(heart.name=="heart-outline"){
        heart.name="heart";
        heart.style.color="red";
    }
    else if(heart.name=="heart"){
       heart.name="heart-outline";
        heart.style.color="white";
    }        
    }

    function mainpageshow(id){
        
            window.location.href = "http://127.0.0.1/Project/User/auditorium_main_page/index.php?id="+id;
            
        }
    
</script>
</html>

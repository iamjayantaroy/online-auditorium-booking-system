<?php require("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 
<style>
.book{

background-color: tomato; 
color: white;
display: block; 

}
.form{
margin-top: 25px;
display: flex;
align-items: center;
justify-content: center;
flex-flow: column;
gap: 15px;
}
</style>
</head>
<body>
<div class="navbar1">
<div class="logo" onclick="window.location.href='http://127.0.0.1/Project/User/frontpage/index.php'">
<img src="logo.png">
</div>

<div class="searchbox">
<input type="text" id="input" placeholder="Search...." class="input"> 
<div class="icon" onclick="search()"> 
<button class="darkmode"><i class="fa-solid fa-magnifying-glass"  ></i></button>
</div>
</div>
<div class="location" onclick="userlocation()">
<ul>
<li>
<a>
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
<a href="http://127.0.0.1/Project/User/frontpage">Home</a></div>
<div class="navoption">
<a href="http://127.0.0.1/Project/User/contact_us/index.php">Contact us</a></div>

<div class="navoption" >
<a href="http://127.0.0.1/Project/User/frontpage/wishlist.php">Wishlist</a></div>

<div class="dropdown" >
<?php  
if(isset($_SESSION["id"])){
?>
<button  class="drop-btn" onclick="myFunction()">Profile</button>
<div id="mylist" class="list">
<a href="http://127.0.0.1/Project/User/frontpage/booking.php">Recent Booking</a>
<a href="http://127.0.0.1/Project/User/frontpage/logout.php">Log out</a>
</div>
</div>
<?php }
else
{?>
<button class="drop-btn" onclick="window.location.href = 'http://127.0.0.1/Project/User/login.php'">Login</button>
<?php } 
?>
<!-- <div class="profile" >
<a >Sign Up</a>
</div> -->
</ul> 
</div>
<?php 
if(isset($_GET['id'])){
    $query = "SELECT * FROM `auditorium details` WHERE `id` = '$_GET[id]'";
    $fetch_src = fetch_src;
    $result = mysqli_query($conn,$query);
    $fetch = mysqli_fetch_assoc($result);
?>


<div class="flex-box">
<div class="left">

<img src="<?php echo $fetch_src .$fetch['pimage'] ?>">


</div>
<div class="right">
<ul>
<li>
    <img src="<?php echo $fetch_src .$fetch['image2'] ?>">
</li>
<li>
    <img src="<?php echo $fetch_src .$fetch['image3'] ?>">
</li>
<li>
    <img src="<?php echo $fetch_src .$fetch['image4'] ?>">
</li>
</ul>

</div>

</div>
<div class="overview">
<div class="details">
<div class="pname"><?php echo $fetch['name'] ?></div>
<div class="add"><?php echo $fetch['location'] ?></div>

<!-- <div class="ratings">
<ul class="star">
<span>4.5</span>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
</ul>
</div> -->

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


<div class="col-2">
<div class="name">
<p>Price</p>
<p style="font-weight: 500;"><?php echo "₹" .$fetch['price'] ?></p>
</div>
<div class="name">
<p>Timing</p>
<div class="day">
<h4>Mon-Sun</h4>
<p>Open 24 Hrs</p>
</div> 
</div>
</div>
<div class="btn-box">

<button class="cart-btn">Add to Favorites</button>

</div> 
</div>
<div class="details2">
<div class="title">Description</div>
<div class="Description"><?php echo $fetch['description'] ?></div>

<form action="my_razorpay_php/create_order.php" class= "form" method="post">

<input type="hidden" name="id" value="<?php echo $fetch['id'] ?>">
<input type="hidden" name="price" value="<?php echo $fetch['price'] ?>">
<h3 style="color:#252B48; font-size:35px; text-shadow: 1px 1px 1px gray"> <b>Auditorium Bookings made easy with <SPAN style="font-size:50px;color:#ffc107;-webkit-text-stroke: 1px #ffc107;">Bookly</SPAN></b></h3>
<div class="btn-box">
<input type="date" id="myDate" required name="bday" min="2015-10-28" style="border-radius:5px;border:none;outline:none;margin-right:15px">
<?php 
if(isset($_SESSION['id'])){ ?>
<input type="hidden" name="user" value="<?php echo $_SESSION['id'] ?>">
<div class="btn-box" style="text-decoration:none">
<button type="submit" class="buy-btn book" name="submit">Book Now</button>
</div>

<?php
}
else{ ?>
<a href="http://127.0.0.1/Project/User/login.php" style="text-decoration:none">
<div class="btn-box" >
<button type="button" class="buy-btn book" name="submit">Book Now</button></a>
</div>

<?php }
?>

</div>




</form>

</div>
</div>
<div class="Amenities">
<div class="title">Amenities</div>
<div class="a-details">
<div class="a-list">
<div class="a-icon"><img src="wifi-line-icon.svg" ></div>
<div class="a-text">Free Wifi</div>
</div>
<div class="a-list">
<div class="a-icon"><img src="air-conditioner-icon.svg" ></div>

<div class="a-text">Air Conditioner
</div>
</div>
<div class="a-list">
<div class="a-icon"><img src="parking-area-icon.svg" ></div>
<div class="a-text">Parking facility</div>
</div>
<div class="a-list">
<div class="a-icon"><img src="cctv-icon.svg" ></div>
<div class="a-text">CCTV cameras</div>
</div>
<div class="a-list">
<div class="a-icon"><img src="car-battery-icon.svg" ></div>
<div class="a-text">Power backup</div>
</div>
<div class="a-list">
<div class="a-icon"><img src="double-bed-icon.svg   " ></div>
<div class="a-text">Rooms</div>
</div>
</div>
</div>
<div class="rating-review">
<div class="title">Review & Ratings</div>
<div class="col-3">
<div class="col-3-a">
<div class="col-3-a-text1"><p>
<?php if($fetch['rating']<5){print($fetch['rating'] .".5");}
else{
print("4.9");
} ?>/5</p></div>
<div class="col-3-a-text2"><p>Overall Ratings</p>
<!-- <p>(Verified Rating)</p></div> -->
</div>
</div>
<div class="col-3-b">
<p>Share Your Experience with other customer</p>
<a href="review/index.php?name= <?php echo $fetch['name'] ?>& id=<?php echo $fetch['id'] ?>">
<button class="review-button" > Write a Review</button></a>
</div>

</div>


<div class="col-4">
<section id="testimonial_area" class="section_padding">
<div class="container">
    <div class="row"> 
        <div class="col-md-12">
            <div class="testmonial_slider_area text-center owl-carousel">
                
                <div class="box-area">	
                        <div class="img-area">
                        <img src="profile.jpg" alt="">
                    </div>	
        
                    <div class="additional-text">
                        <span>Bitisha Roy</span>
                    <p >
                    <?php 
                                $count = 1;
                                while($count<=5){
                                    if($count<=3){
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
                    </p>
                </div>										
                    <p class="content">
                        Lorem Ipsum is simply dummy text of the printing and 
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text 
                        ever sinceLorem Ipsum is simply dummy text of the printing and 
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text 
                        ever since
                    </p>
                    
                </div> 
            
                <div class="box-area">	
                    <div class="img-area">
                        <img src="profile.jpg" alt="">
                    </div>
                    <div class="additional-text">
                        <span>Rajat Roy</span>
                    <p >
                    <?php 
                                $count = 1;
                                while($count<=5){
                                    if($count<=5){
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
                    </p>
                </div>									
                    <p class="content">
                        Lorem Ipsum is simply dummy text of the printing and 
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text 
                        ever since
                    </p>
                    
                </div> 
            
                <div class="box-area">	
                    <div class="img-area">
                        <img src="profile.jpg" alt="">
                    </div>	
                    <div class="additional-text">
                        <span>Jayanta Roy</span>
                    <p >
                    <?php 
                                $count = 1;
                                while($count<=5){
                                    if($count<=2){
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
                    </p>
                </div>									
                    <p class="content">
                        Lorem Ipsum is simply dummy text of the printing and 
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text 
                        ever since
                    </p>
                    
                </div> 
            
                <div class="box-area">	
                    <div class="img-area">
                        <img src="profile.jpg" alt="">
                    </div>	
                    <div class="additional-text">
                        <span>Asmita Roy</span>
                    <p >
                    <?php 
                                $count = 1;
                                while($count<=5){
                                    if($count<=5){
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
                    </p>
                </div>									
                    <p class="content">
                        Lorem Ipsum is simply dummy text of the printing and 
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text 
                        ever since
                    </p>
                    
                </div> 
            
                <div class="box-area">	
                    <div class="img-area">
                        <img src="profile.jpg" alt="">
                    </div>	
                    <div class="additional-text">
                        <span>Suroj Roy</span>
                    <p >
                    <?php 
                                $count = 1;
                                while($count<=5){
                                    if($count<=3){
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
                    </p>
                </div>										
                    <p class="content">
                        Lorem Ipsum is simply dummy text of the printing and 
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text 
                        ever since
                    </p>
                    
                </div> 
            
                <div class="box-area">	
                    <div class="img-area">
                        <img src="profile.jpg" alt="">
                    </div>	
                    <div class="additional-text">
                        <span>Asha Roy</span>
                    <p >
                    <?php 
                                $count = 1;
                                while($count<=5){
                                    if($count<=5){
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
                    </p>
                </div>									
                    <p class="content">
                        Lorem Ipsum is simply dummy text of the printing and 
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text 
                        ever since
                    </p>
                </div>
                <div class="box-area">	
                    <div class="img-area">
                        <img src="profile.jpg" alt="">
                    </div>	
                    <div class="additional-text">
                        <span>Arijit Roy</span>
                                <p>
                                <?php 
                                $count = 1;
                                while($count<=5){
                                    if($count<=4){
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
                                </p>
                </div>									
                    <p class="content">
                        Lorem Ipsum is simply dummy text of the printing and 
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text 
                        ever since
                    </p>
                </div>
                <?php
            $query2 = "SELECT * from `review` r inner join `user details` u
            on r.userid = u.id
            WHERE r.id = '$fetch[id]'";
                $result2 = mysqli_query($conn,$query2);
                if($result2){
                if(mysqli_num_rows($result2)>=1)
                {
                    while($fetch2 = mysqli_fetch_assoc($result2))
                    { ?>
                        <div class="box-area">	
                    <div class="img-area">
                        <img src="profile.jpg" alt="">
                    </div>	
                    <div class="additional-text">
                        <span><?php print_r($fetch2['name']) ?></span>
                    <p >
                    <?php 
                                $count = 1;
                                while($count<=5){
                                    if($count<=$fetch2['star']){
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
                    </p>
                </div>									
                    <p class="content">
                        <?php print_r($fetch2['text']) ?>
                    </p>
                </div>
                    <?php }
                }
                
                }
                ?>

            </div>
        </div>
    </div>
</div>
</section>
</div>
</div>
<?php } ?>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
<script src="script.js"></script>
<script> document.getElementById("myDate").min = new Date().getFullYear() + "-" +  parseInt(new Date().getMonth() + 1 ) + "-" + new Date().getDate()</script>

</body>
<div class="more">
<div class="title">Nearby Auditoriums </div>
<div class="box">

<?php 

$userLatitude = $fetch['latitude']; 
$userLongitude = $fetch['longitude'];

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

$query3 = "SELECT * FROM `auditorium details`";
$result3 = mysqli_query($conn,$query3);

// Step 4: Calculate the distance and store in an array
$fetch3 = array();
while ($row = $result3->fetch_assoc()) {


$distance = calculateDistance($userLatitude, $userLongitude, $row['latitude'], $row['longitude']);
$fetch3[] = array('distance' => $distance, 'name' => $row['name'], 
    'id' => $row['id'],'price' => $row['price'],'description' => $row['description'],
'rating' => $row['rating'],'location' => $row['location'],'capacity' => $row['capacity'],
'pimage' => $row['pimage'],'image2' => $row['image2'],'image3' => $row['image3'],
'image4' => $row['image4'],'Slocation' => $row['Slocation']);
}


usort($fetch3, function($a, $b) {
return $a['distance'] - $b['distance'];
});


$near = 0;

foreach($fetch3 as $fetch3)
{  
if($fetch3['name']==$fetch['name'])
{continue;}

if($near==4)
exit();
?>

<div class="box1">
<a href="index.php?id=<?php print_r($fetch3['id']) ?>"><img src="<?php print_r($fetch_src.$fetch3['pimage']) ?>"></a>
<h3><?php print_r($fetch3['name']) ?></h3>
<p><?php print_r($fetch3['Slocation']) ?></p>
</div>

<?php  $near++;}
?> 


</div>
</div>



</html>
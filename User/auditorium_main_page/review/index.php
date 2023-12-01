<?php
session_start();
require("connection.php");
if(!(isset($_SESSION['id'])))
{
    header("location:http://127.0.0.1/Project/User/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>write a review</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="style.css" rel="stylesheet">
</head>
<body>
  
        <div class="logo">
        <a href="http://127.0.0.1/Project/User/frontpage/index.php"><img src="logo.png"></a> 
        <h2>Review</h2>
        </div>

        <div class="wrapper">
            <?php
                if(isset($_GET['name']))
                {?>
            <form action="index.php" method="POST">
                
                <h3><?php print_r($_GET['name']) ?></h3>
                
                <div class="rating">
                    
                    <input type="number" name="rating" id ="star" value="5" hidden>
                    <input type="number" name="id" value="<?php print_r($_GET['id']) ?>" hidden>
                    <i class='bx bx-star star' style="--i: 0;" onclick="star(getComputedStyle(this).getPropertyValue('--i'))"></i>
                    <i class='bx bx-star star' style="--i: 1;" onclick="star(getComputedStyle(this).getPropertyValue('--i'))"></i>
                    <i class='bx bx-star star' style="--i: 2;" onclick="star(getComputedStyle(this).getPropertyValue('--i'))"></i>
                    <i class='bx bx-star star' style="--i: 3;" onclick="star(getComputedStyle(this).getPropertyValue('--i'))"></i>
                    <i class='bx bx-star star' style="--i: 4;" onclick="star(getComputedStyle(this).getPropertyValue('--i'))"></i>
                </div>
                <textarea name="opinion"   placeholder="Write a review" ></textarea>
                <div class="btn-group">
                    <button type="submit" name ="submit" class="btn submit">Submit</button>
                    
                </div>
            </form>
            <?php }
                ?>

        </div>
      
   <script src="script.js"></script>
   <script>
    function star(i){
        i =parseInt(i);
        i = i+1
        var star = i;
        document.getElementById("star").value = star;
        return i;
    }
   </script>

   <?php
   if(isset($_POST['submit']))
   {
    print_r($_POST);
    $user = $_SESSION['id'];
    $id = $_POST['id'];
    $star = $_POST['rating'];
    $text = $_POST['opinion'];
    $query = "INSERT into `review` (`userid`, `id`, `star`, `text`) 
                            VALUES ('$user','$id','$star','$text')";
    
    $result = mysqli_query($conn,$query);
    header("location:http://127.0.0.1/Project/User/auditorium_main_page/index.php?id=$id");
   }
   ?>
</body>
</html>
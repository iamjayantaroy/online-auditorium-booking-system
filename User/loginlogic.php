 <?php 
 require("connection.php");
    session_start(); 
 if(isset($_POST["signup"])){
    $username = $_POST["name"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    

    $query = "SELECT * FROM `user details` where `password`='$password' and `mobile`='$mobile'";
    $result = mysqli_query($conn,$query);
    if ($result) {
    if (mysqli_num_rows($result) > 0) {
        header("location:login.php?found");
        exit();
    }
}

    $sql = "INSERT INTO `user details` (`name`, `mobile`, `password`) 
    VALUES ('$username','$mobile','$password')";
    $result = mysqli_query($conn,$sql);

    $sql = "SELECT * FROM `user details` WHERE `password`= '$password' AND `mobile` = '$mobile'";
    $result = mysqli_query($conn,$sql);
    $fetch = mysqli_fetch_assoc($result);
    $_SESSION["name"] = $fetch['name'];
    $_SESSION["id"] = $fetch['id'];
    header("location:frontpage/index.php");
}
    


 if(isset($_POST["login"])){
    $phone = $_POST["phone"];
    $password = $_POST["password"];
 
 $sql = "SELECT * FROM `user details` WHERE `password`= '$password' AND `mobile` = '$phone'";
 $result = mysqli_query($conn,$sql);
 $fetch = mysqli_fetch_assoc($result);
 
 
 if($fetch['usertype']=="user")
 {
    $_SESSION["id"] = $fetch['id'];
    $_SESSION["name"] = $fetch['name'];
    header("location:frontpage/index.php");
 }
 elseif($fetch['usertype']=="admin")
 {
   $_SESSION["id"] = $fetch['id'];
   $_SESSION["name"] = $fetch['name'];
    header("location:http://127.0.0.1/Project/Admin/index.php");
 }
 else { 
    header("location:login.php?log=");
 }
}

 ?>
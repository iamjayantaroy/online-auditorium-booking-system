<?php
require("connection.php");
    
function img_upload($img){
    $temp_loc = $img['tmp_name'];
    $new_name = $img['name'];
    $new_loc = upload.$new_name;
    if(move_uploaded_file($temp_loc,$new_loc))
    {
        return $new_name;
    }
}

function img_remove($img){
    unlink(upload.$img);
}

if(isset($_POST["addauditorium"])){
    $pimage = img_upload($_FILES['pimage']);
    $image2 = img_upload($_FILES['image2']);
    $image3 = img_upload($_FILES['image3']);
    $image4 = img_upload($_FILES['image4']);

$query = "INSERT INTO `auditorium details` (`name`, `price`, `description`, `location`, 
        `rating`, `capacity`, `longitude`, `latitude`, `pimage`, `image2`, `image3`, `image4`) 
VALUES ('$_POST[name]', '$_POST[price]', '$_POST[description]', '$_POST[location]', '$_POST[rating]', 
        '$_POST[capacity]', '$_POST[longitude]', '$_POST[latitude]', '$pimage', '$image2', '$image3', '$image4')";

    mysqli_query($conn,$query);
    header("location:auditorium_list.php");
}



if(isset($_GET["del"]) && $_GET["del"]>0){
    $query = "SELECT * FROM `auditorium details` WHERE `id` = '$_GET[del]'";
    $result = mysqli_query($conn,$query);
    $fetch = mysqli_fetch_assoc($result);
    img_remove($fetch['pimage']);
    img_remove($fetch['image2']);
    img_remove($fetch['image3']);
    img_remove($fetch['image4']);

    $query = "DELETE FROM `auditorium details` WHERE `id` = '$_GET[del]'";
    mysqli_query($conn,$query);
    header("location:auditorium_list.php");
}


if(isset($_POST["editauditorium"])){
    // print_r($_POST);
    // print_r($_FILES);
    // print_r(file_exists($_files['pimage']['tmp_name']));
    // die();
    
    if(file_exists($_FILES['pimage']['tmp_name']) || is_uploaded_file($_FILES['image2']['tmp_name']) || file_exists($_FILES['image3']['tmp_name']) || is_uploaded_file($_FILES['image4']['tmp_name'])){
        $query = "SELECT * FROM `auditorium details` WHERE `id` = '$_POST[editid]'";
        $result = mysqli_query($conn,$query);
        $fetch = mysqli_fetch_assoc($result);

    if(file_exists($_FILES['pimage']['tmp_name'])){
        img_remove($fetch['pimage']);
        $pimage = img_upload($_FILES['pimage']);
    }
    else{
        $pimage = $fetch['pimage'];
    }
    
    if(file_exists($_FILES['image2']['tmp_name'])){
        img_remove($fetch['image2']);
        $image2 = img_upload($_FILES['image2']);
    }
    else{
        $image2 = $fetch['image2'];
    }

    if(file_exists($_FILES['image3']['tmp_name'])){
        img_remove($fetch['image3']);
        $image3 = img_upload($_FILES['image3']);
    }
    else{
        $image3 = $fetch['image3'];
    }
    if(file_exists($_FILES['image4']['tmp_name'])){
        img_remove($fetch['image4']);
        $image4 = img_upload($_FILES['image4']);
    }
    else{
        $image4 = $fetch['image4'];
    }
    

    // img_remove($fetch['pimage']);
    // img_remove($fetch['image2']);
    // img_remove($fetch['image3']);
    // img_remove($fetch['image4']);

    // $pimage = img_upload($_FILES['pimage']);
    // $image2 = img_upload($_FILES['image2']);
    // $image3 = img_upload($_FILES['image3']);
    // $image4 = img_upload($_FILES['image4']);
    $update = "UPDATE `auditorium details` SET `name`='$_POST[name]',`price`='$_POST[price]',`description`='$_POST[description]',
                        `location`='$_POST[location]',`rating`='$_POST[rating]',`capacity`='$_POST[capacity]',`longitude`='$_POST[longitude]',
                        `latitude`='$_POST[latitude]',`pimage`='$pimage',`image2`='$image2',`image3`='$image3',
                        `image4`='$image4' WHERE `id` = '$_POST[editid]'";
    }
    else{
        $update = "UPDATE `auditorium details` SET `name`='$_POST[name]',`price`='$_POST[price]',`description`='$_POST[description]',
                        `location`='$_POST[location]',`rating`='$_POST[rating]',`capacity`='$_POST[capacity]',`longitude`='$_POST[longitude]',
                        `latitude`='$_POST[latitude]' WHERE `id` = '$_POST[editid]'";

    }
    if(mysqli_query($conn,$update))
    header("location: auditorium_list.php?successs");
    else
    header("location: auditorium_list.php?failed");
    
}

?>
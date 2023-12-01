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
    <div class="d-flex align-items-center justify-content-between px-3">
        <h2>Auditorium Details</h2>
        <button type="button" class="btn btn-warning text-dark " data-bs-toggle="modal" data-bs-target="#addauditorium">
          <i class="bi bi-building-add"></i> Add Auditorium
        </button>
    </div>
 </div>
 

 <div class="modal fade" id="addauditorium" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="crud.php" method="post" enctype="multipart/form-data">
         <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" >Add Auditorium</h1>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text">Name</span>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Price</span>
                    <input type="number" class="form-control" name="price">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Description</span>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Location</span>
                    <input type="text" class="form-control" name="location">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Rating</span>
                    <input type="number" class="form-control" name="rating" min="1" max="5">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Capacity</span>
                    <input type="number" class="form-control" name="capacity">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Longitude</span>
                    <input type="text" class="form-control" name="longitude">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Latitude</span>
                    <input type="text" class="form-control" name="latitude">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" >Primary Image</label>
                    <input type="file" class="form-control" name="pimage" accept=".jpg , .jpeg , .png , .svg">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" >Image 2</label>
                    <input type="file" class="form-control" name="image2" accept=".jpg , .jpeg , .png , .svg">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" >Image 3</label>
                    <input type="file" class="form-control" name="image3" accept=".jpg , .jpeg , .png , .svg">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" >Image 4</label>
                    <input type="file" class="form-control" name="image4" accept=".jpg , .jpeg , .png , .svg">
                </div>

            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" name="addauditorium">Add</button>
        </div>
    </div>
    </form>
   
  </div>
</div>

<div class="modal fade" id="editauditorium" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="crud.php" method="post" enctype="multipart/form-data">
         <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" >Edit Auditorium</h1>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text">Name</span>
                    <input type="text" class="form-control" name="name" id="editname">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Price</span>
                    <input type="number" class="form-control" name="price" id="editprice">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Description</span>
                    <textarea class="form-control" name="description" id="editdescription"></textarea>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Location</span>
                    <input type="text" class="form-control" name="location" id="editlocation">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Rating</span>
                    <input type="number" class="form-control" name="rating" id="editrating" min="1" max="5">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Capacity</span>
                    <input type="number" class="form-control" name="capacity" id="editcapacity">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Longitude</span>
                    <input type="text" class="form-control" name="longitude" id="editlongitude">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Latitude</span>
                    <input type="text" class="form-control" name="latitude" id="editlatitude">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" >Primary Image</label>
                    <input type="file" class="form-control" name="pimage" id="pimage" accept=".jpg , .jpeg , .png , .svg">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" >Image 2</label>
                    <input type="file" class="form-control" name="image2" id="editimage2" accept=".jpg , .jpeg , .png , .svg">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" >Image 3</label>
                    <input type="file" class="form-control" name="image3" id="editimage3" accept=".jpg , .jpeg , .png , .svg">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" >Image 4</label>
                    <input type="file" class="form-control" name="image4" id="editimage4" accept=".jpg , .jpeg , .png , .svg">
                </div>
                <input type="hidden" name="editid" id="editid">

            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" name="editauditorium">Edit</button>
        </div>
    </div>
    </form>
   </div>
</div>

<?php

    if(isset($_GET['edit']) && $_GET['edit']>0)
    {
        $query = "SELECT * FROM `auditorium details` WHERE `id` ='$_GET[edit]'";
        $result = mysqli_query($conn,$query);
        $fetch = mysqli_fetch_assoc($result);
        echo"
        <script>
            const editmodal = new bootstrap.Modal('#editauditorium', {
            keyboard: false
            });
            document.querySelector('#editname').value = `$fetch[name]`;
            document.querySelector('#editprice').value = `$fetch[price]`;
            document.querySelector('#editdescription').value = `$fetch[description]`;
            document.querySelector('#editlocation').value = `$fetch[location]`;
            document.querySelector('#editrating').value = `$fetch[rating]`;
            document.querySelector('#editcapacity').value = `$fetch[capacity]`;
            document.querySelector('#editlongitude').value = `$fetch[longitude]`;
            document.querySelector('#editlatitude').value = `$fetch[latitude]`;
            document.querySelector('#editid').value = `$fetch[id]`;
            editmodal.show();
        </script>
        ";
    }
?>


<div class="container mt-5">
    <table class="table table-hover text-center table-bordered">
         <thead  style="background-color:#252B48">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Location</th>
      <th scope="col">Rating</th>
      <th scope="col">Capacity</th>
      <th scope="col">longitude</th>
      <th scope="col">Latitude</th>
      <th scope="col" >Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
    $query = "SELECT * FROM `auditorium details`";
    $result = mysqli_query($conn,$query);
    $i = 1;
    $fetch_src = fetch_src;
    while($fetch = mysqli_fetch_assoc($result)){
        echo<<<auditorium
        <tr class="align-middle">
          <th scope="row">$i</th>
          <td><img src="$fetch_src$fetch[pimage]" width="50" height="50" style="margin-bottom:1px"> <img src="$fetch_src$fetch[image2]" width="50" height="50" ] style="margin-bottom:1px"> 
          <img src="$fetch_src$fetch[image3]" width="50" height="50" style="margin-bottom:1px"> 
          <img src="$fetch_src$fetch[image4]" width="50" height="50"></td>
          <td>$fetch[name]</td>
          <td>₹$fetch[price]</td>
          <td>$fetch[description]</td>
          <td>$fetch[location]</td>
          <td>$fetch[rating]</td>
          <td>$fetch[capacity]</td>
          <td>$fetch[longitude]</td>
          <td>$fetch[latitude]</td>
          <td>
          <a href="?edit=$fetch[id]" class="btn btn-warning btn-sm m-2""><i class="bi bi-pencil-square "></i></a> 
          <button class="btn btn-sm btn-danger" onclick="confirm_del($fetch[id])"><i class="bi bi-trash3-fill"></i></button>
          </td>
        </tr>
        auditorium;
        $i++;
    }
    ?>
    
    
  </tbody>
    </table>
</div>
<script>
    function confirm_del(id){
        if(confirm("Are you sure, You want to delete this data?")){
            window.location.href = "crud.php?del="+id;
            
        }
    }
</script>
</body>
</html>
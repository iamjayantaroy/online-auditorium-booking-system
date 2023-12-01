<?php
require("connection.php");
session_start();
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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" >
</head>
<body>
  
    <section>
        <div class="section-header">
          <div class="logo">
            <a href="http://127.0.0.1/Project/User/frontpage/index.php"><img src="logo.png"></a>
          </div>
          <div class="container">
            <h2>Contact Us</h2>
            <p>Email us with any Question or inquries or call . we would be happy to answer your Question and set up a meeting with you.</p>
          </div>
        </div>
        
        <div class="container">
          <div class="row">
            
            <div class="contact-info">
              <div class="contact-info-item">
                <div class="contact-info-icon">
                  <i class="fas fa-home"></i>
                </div>
                
                <div class="contact-info-content">
                  <h4>Address</h4>
                  <p>421 Subhash Nagar Bagjola Link Road <br/> kolkata <br/>700001</p>
                </div>
              </div>
              
              <div class="contact-info-item">
                <div class="contact-info-icon">
                  <i class="fas fa-phone"></i>
                </div>
                
                <div class="contact-info-content">
                  <h4>Phone</h4>
                  <p>9051650403</p>
                </div>
              </div>
              
              <div class="contact-info-item">
                <div class="contact-info-icon">
                  <i class="fas fa-envelope"></i>
                </div>
                
                <div class="contact-info-content">
                  <h4>Email</h4>
                 <p>rroy98124@gmail.com</p>
                </div>
              </div>
            </div>
            
            <div class="contact-form">
              <form action="index.php" id="contact-form" method="POST">
                <h2>Send Message</h2>
                <div class="input-box">
                  <input type="text" required="true" name="name" id="text" >
                  <span>Full Name</span>
                </div>
                
                <div class="input-box">
                  <input type="email" required="true" name="email">
                  <span>Email</span>
                </div>
                
                <div class="input-box">
                  <textarea required="true" name="massege"></textarea>
                  <span>Type your Message...</span>
                </div>
                
                <div class="input-box">
                  <input type="submit" value="Send" name="submit">
                </div>
              </form>
            </div>
            
          </div>
        </div>
    </section>
</body>
<?php
if(isset($_POST['submit']))
{
  $user = $_SESSION['id'];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $massege = $_POST['massege'];

  $query = "INSERT INTO `contact us`(`userid`, `name`, `email`, `massege`) 
  VALUES ('$user','$name','$email','$massege')";

  $result = mysqli_query($conn,$query);
  header("location:http://127.0.0.1/Project/User/frontpage/index.php");
}
?>

</html>
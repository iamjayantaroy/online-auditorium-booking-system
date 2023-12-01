<?php
session_start(); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Signup Form </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    
</head>

<body>
    <section class="container forms p-3 mb-5 rounded">
        <div class="about">
            <img src="logo.png" alt="" >
            <h2 style="color: aliceblue;">Where Booking is as easy as "1-2-3"</h2>
        </div>

        <div class="form login">
            <div class="form-content">
                <header style="color: aliceblue;">Login</header>
                <span id="logerror" class="error" style="color: red; padding:0 35px"></span>
                <form action="loginlogic.php" method="post">
                    <div class="field input-field">
                        
                        <input type="tel" placeholder="Phone Number" class="input" name = "phone" required pattern="[6789][0-9]{9}"
                            title="Please enter valid phone number">
                    </div>

                    
                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password" name="password" required>
                        <i class='bx bx-hide eye-icon'></i>
                    </div>



                    <div class="field button-field">
                        <button type="submit" name="login" >Login</button>
                        
                    </div>

                    <?php if (!empty($errors)) {
                        echo '<br/> <p class="error">The following errors occurred: <br />';

                        //foreach is a simplified version of the 'for' loop
                        foreach ($errors as $err) {
                            echo "$err <br />";
                        }

                        echo '</p>';
                    }?>
                    
                </form>

                <div class="form-link">
                    <span style="color:white">Don't have an account? <a href="#" class="link signup-link" style="color:darkblue">Signup</a></span>
                </div>
            </div>
        </div>

        <div class="form signup" id="signup">
            <div class="form-content">
                <header style="color: aliceblue;">Signup</header>
                <form action="loginlogic.php" method="post">
                    
                    
                    <div class="field input-field">
                        <span id="nameError" class="error" style="color: red"></span>
                        <input type="text" placeholder="Name" class="input" required
                            title="Please enter only charectors" name="name" id="some-name">
                    </div>

                    <span id="phoneError" class="error" style="color: red"></span>
                    <div class="field input-field">
                        <input type="tel" placeholder="Phone Number" class="input" required
                            title="Please enter valid phone number" name="mobile" id="some-phone">
                    </div>
                    <span id="passError" class="error" style="color: red"></span>
                    <div class="field input-field">
                        <input type="password" placeholder="Create password" class="password" required
                             title="Must contain at least one  number and one uppercase and lowercase 
                                letter, and at least 8 or more characters" name="password" id="some-pass">
                                

                    </div>
                    <span id="otpError" class="error" style="color: red"></span>
                    <div class="field input-field otp">
                        <input type="number" placeholder="Enter your OTP" id ="otp" class="password" required name="otp">
                    </div>

                    <div class="field button-field">
                        <button type="button" onclick="otpshow()"  id="otpBt">Generate Otp</button>
                        <input type="hidden" name="signup" id="sbBt" value="submit" disabled>
                    </div>

                </form>

                <div class="form-link">
                    <span style="color:white">Already have an account? <a href="#" class="link login-link" style="color:darkblue">Login</a></span>
                </div>
            </div>
        </div>


    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous">
</script>
    <script src="script.js"></script>
    <?php if(isset($_GET["log"]))
    {?> 
    <script>document.getElementById("logerror").innerHTML="Invalid User Id or Password";</script>
    <?php } ?>
    <?php if(isset($_GET["found"]))
    {?> 
    <script>document.getElementById("logerror").innerHTML="User Already Exists";</script>
    <?php } ?>
    
</body>

</html>
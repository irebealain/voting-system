
<?php 
include('adminConn.php');
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Assets/Agahozo+Shalom+Logo.png">
    <link rel="stylesheet" href="front.css">
    <title>Get Started</title>
</head>
<body>
    <section class="heroSectionRight">
        <img src="./Assets/Agahozo+Shalom+Logo.png" alt="ASYV logo" height="150px">
        <div class="headings">
            <h2>Participate In ASYV</h2>
            <h2>Elections <span style="color: #EDA246;">Easily!</span></h2>
        </div>
        <a href="Login.html" style="text-decoration: none;"><button type="button">LOG IN</button></a>
        <a href="signup.html" style="text-decoration: none;"><button type="button">SIGN UP</button></a>
        <a href="adminLogin.php"><h1 class="Admin" style="margin-top: -2.5rem;font-size: 15px;
        font-weight: 600;">Login as Admin</h1></a>
    </section>
    <section class="heroSectionLeft">
        <img src="./Assets/undraw_sign_up_ln1s 1.png" alt="" height="100%" style="width: 100%;
        max-width: 100%;
        margin-left: 16rem;">
    </section>
</body>
</html>
<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'voting system';

    $conn = mysqli_connect($server, $user, $password, $db);
    

    if(isset($_POST['adminsub']))
    {
        $email = $_POST['email'];
        $pswd = $_POST['pass'];
        $nyaxo = "SELECT *FROM `admin` WHERE `Email` = '$email' and `Password` = '$pswd'";
        $result=mysqli_query($conn,$nyaxo);
        $row=mysqli_fetch_assoc($result);
        if($row){    
            session_start();
            $_SESSION['name']=$row['name'];
            $_SESSION['Email']=$row['Email'];
            header('location:adminDashboard.php');

        }
        else{
            echo "Incorrect email or password";
        }
    }
?>

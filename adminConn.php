<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'election_system';

    $conn = mysqli_connect($server, $user, $password, $db);
    
// admin login php codes
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
// for the student login php codes
    if (isset($_POST['studentlogin'])){
        $id = $_POST['studentid'];
        $stupswd = $_POST['studentpswd'];

        $alain = "SELECT *FROM `users` WHERE `UserId` = '$id' and `Password` = '$stupswd'";
        $res = mysqli_query($conn,$alain);
        $data = mysqli_fetch_assoc($res);
        if ($data){
            session_start();
            $_SESSION['ID'] = $data['UserId'];
            $_SESSION['name'] = $data['Name'];
            header('location: userLandingPage.php');
        }

    }
?>

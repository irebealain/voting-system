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
            $_SESSION['name']=$row['Name'];
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
        $name;
        $alain = "SELECT *FROM `users` WHERE `UserId` = '$id' and `Password` = '$stupswd'";
        $res = mysqli_query($conn,$alain);
        $data = mysqli_fetch_assoc($res);
        if ($data){
            session_start();
            $_SESSION['ID'] = $data['UserId'];
            $_SESSION['name'] = $data['Name'];
            $_SESSION['family'] = $data['Name'];
            header('location: welcomeSuccessfully.php');
        }

    }
    // for changing the name on the successfully creation of account

    // adding a position
    if (isset($_POST['createPos'])){
        $posName = $_POST['posname'];
        // $addPos = "INSERT *INTO `positions` (`Name`) VALUES (`$posName?`)";
        $addPos = "INSERT INTO `positions` (`Name`) VALUES ('$posName')";
        mysqli_query($conn,$addPos);
        header("location: adminDashboard.php");
        
        // $posData = mysqli_fetch_assoc($pos);
    }
    // submittiming the candidates in the table
    if (isset($_POST['addCand'])){
        $candName = $_POST['candName'];
        $choice = $_POST['choose'];
        $bio = $_POST['biograph'];
        $manifest = $_POST['manifesto'];

        $createCand = "INSERT INTO `candidate` (`Name`, `Bio`, `Manifesto`, `PositionId`)VALUES ('$candName', '$bio', '$manifest', '$choice')";
        mysqli_query($conn, $createCand);
        header("location: adminDashboard.php");
    }
?>

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
            // $_SESSION['voter_id']=$row['UserId'];
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
            $_SESSION['Level']=$data['level'];
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
        header("location: adminRepresentativesPage.php");
        
        // $posData = mysqli_fetch_assoc($pos);
    }
    // submittiming the candidates and fetching them
    if (isset($_POST['addCand'])){
        $candName = $_POST['candName'];
        $choice = $_POST['choose'];
        $bio = $_POST['biograph'];
        $manifest = $_POST['manifesto'];

        $createCand = "INSERT INTO `candidate` (`Name`, `Bio`, `Manifesto`, `PositionId`)VALUES ('$candName', '$bio', '$manifest', '$choice')";
        mysqli_query($conn, $createCand);
        // $getData = mysqli_fetch_assoc($putData);
        header("location: adminRepresentativesPage.php");
    }
    if (isset($_POST['addAdmin'])){
        $adminEmail = $_POST['adminEmail'];
        $adminName = $_POST['adminName'];
        $adminPswd = $_POST['adminPswd'];
        $adminGender = $_POST['adminGender'];

        $createAdmin = "INSERT INTO `admin` (`Email`,`Name`,`Password`,`Gender`) VALUES ('$adminEmail','$adminName','$adminPswd','$adminGender')";
        mysqli_query($conn,$createAdmin);
        header("location: addAdminPage.php");
    }
    // deleting the administrators 
    if(isset($_GET['deleteid'])){
        // Sanitize the input
        $id = mysqli_real_escape_string($conn, $_GET['deleteid']);

        // Execute the DELETE query
        $sql = "DELETE FROM `admin` WHERE `admin`.`Email` = '$id'";
        $result = mysqli_query($conn, $sql);
    }
?>

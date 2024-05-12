<?php 
session_start();
include ('adminConn.php');

$votes=array();
if (isset($_POST['submitVotes'])){
    $votes=$_POST;
    $sqr="SELECT *FROM positions";
    $rec=mysqli_query($conn,$sqr);
    while($data=mysqli_fetch_assoc($rec)){
        $poid=$data['positionId'];
        if(isset($_POST[$poid])){
            $candidateId=$_POST[$poid];
            $userId=$_SESSION['ID'];
            $sqlr="INSERT INTO votes(`UserId`,`CandidateId`,`PositionId`)VALUES('$userId','$candidateId','$poid')";
            mysqli_query($conn, $sqlr);
            header('location:votingInterface.php');
        }
    }

}
?>
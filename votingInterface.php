<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votting Interface</title>
    <link rel="stylesheet" href="votingInterface.css">
</head>
<body>
    <h1 style="text-align: center; padding: 3rem 0; font-size: 25px; color: #EDA246;">CHOOSE A CANDIDATE</h1>
    
    <h2 style="margin-left: 7rem; font-size: 22px; font-weight: 600; padding-top: 0.6rem;" >Choose you Prefered Candidate</h2>
    <div class="candCont">
        <?php 
        include('adminConn.php');
        $query1 = "SELECT *FROM positions";
        $record1 = mysqli_query($conn, $query1);
        while($row1 = mysqli_fetch_assoc($record1)){

            echo " <h1 style=\"text-align: center; padding: 1rem 0; font-size: 18px; color: #48805F; font-weight: 600;\">". $row1['Name']."</h1>";
            echo "<div class=\"president\">";       
            $query = "SELECT * FROM `candidate` WHERE `positionId` = " . $row1['positionId'];

                    $record = mysqli_query($conn, $query);
                    
                    while ($row = mysqli_fetch_assoc($record)) {
                        echo "
                        
                        <div class=\"cand1\" style=\"padding: 0 1rem;\">
                            <div class=\"profile\">
                                <img src=\"./Assets/Rectangle.png\" alt=\"\" height=\"100px\" width=\"100px\">
                                <p style=\"font-weight: 600;\">" . $row['Name'] . "</p>
                            </div>
                            <div class=\"desc\">
                            <p style=\"font-weight: 600;\">Biograpy</p>
                                <p>" . $row['Bio'] . "</p>
                            </div>
                            <button>VIEW PROFILE</button>
                            <button>VOTE</button>
                        </div>";
                    }
                }
                ?>
       
    </div>
</body>
</html>
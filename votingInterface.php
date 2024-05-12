<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votting Interface</title>
    <link rel="stylesheet" href="votingInterface.css">
    <!-- <link rel="stylesheet" href="votingInterface.js"> -->
</head>
<body>
    <h1 style="text-align: center; padding: 3rem 0; font-size: 25px; color: #EDA246;">CHOOSE A CANDIDATE</h1>
    
    <h2 style="margin-left: 7rem; font-size: 22px; font-weight: 600; padding-top: 0.6rem;" >Choose you Prefered Candidate</h2>
    <div class="popUpContainer" id="show">
    <div class="profilePopUp">
    <svg style="position: absolute; cursor: pointer; margin-left: 14rem; top: 1rem; display: inline-block;" onclick="hidePop()" width="20px" height="20px" viewBox="-133.12 -133.12 778.24 778.24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--fxemoji" preserveAspectRatio="xMidYMid meet" fill="#000000" stroke="#000000" stroke-width="0.00512"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-133.12" y="-133.12" width="778.24" height="778.24" rx="389.12" fill="#eda246" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#fff" d="M325.297 256l134.148-134.148c19.136-19.136 19.136-50.161 0-69.297c-19.137-19.136-50.16-19.136-69.297 0L256 186.703L121.852 52.555c-19.136-19.136-50.161-19.136-69.297 0s-19.136 50.161 0 69.297L186.703 256L52.555 390.148c-19.136 19.136-19.136 50.161 0 69.297c9.568 9.567 22.108 14.352 34.648 14.352s25.081-4.784 34.648-14.352L256 325.297l134.148 134.148c9.568 9.567 22.108 14.352 34.648 14.352s25.08-4.784 34.648-14.352c19.136-19.136 19.136-50.161 0-69.297L325.297 256z"></path></g></svg> 
    <div class="upper">
        <img src=".\Assets\Rectangle(2).png" alt="" height="100px" width="100px">
        <h1 style=" font-size: 20px; font-family: 'Poppins', sans-serif;">Ana Pilar Martinez</h1>
    </div>
    <div class="lower">
        <div class="bio">
            <h1 class="about">ABOUT</h1>
            <hr style="background-color: #EDA246;
            width: 110px;
            height: 5px;
            border: none;">
            <h1 style="padding: 2rem 0; font-size: 20px; font-family: 'Poppins', sans-serif;">SHORT BIOGRAPH</h1>
            <p>Katie is a seasoned marketing professional with over 10 years of experience in digital <br>advertising strategies. She has helped numerous brands achieve their online marketing <br>goals, leading to increased visibility and 3x revenue YoY</p>
        </div>
        <div class="manifesto">
            <h1 style="padding: 2rem 0; font-size: 20px; font-family: 'Poppins', sans-serif;">ELECTION MANIFESTO</h1>
            <p>I am a hard-working and driven individual who isn't afraid to face a challenge. I'm <br>
                passionate about my work and I know how to get the job done. <br>

                I would describe myself as an open and honest person who doesn't believe in misleading <br>
                other people and tries to be fair in everything I do.</p>
        </div>
        <button>VOTE</button>
    </div>
    </div>
    </div>
    <div class="candCont">
        <?php 
        include('adminConn.php');
        $query1 = "SELECT *FROM positions";
        $record1 = mysqli_query($conn, $query1);
        echo "<form action=\"votesSubmit.php\" method=\"POST\">";
        while($row1 = mysqli_fetch_assoc($record1)){

            echo " <h1 style=\"text-align: center; padding: 1rem 0; font-size: 18px; color: #48805F;     margin-top: 5rem; font-weight: 600;\">". $row1['Name']."</h1>";
            echo "<div class=\"president\">";    
            $query = "SELECT * FROM `candidate` WHERE `positionId` = " . $row1['positionId'];

                    $record = mysqli_query($conn, $query);
            echo "<div class=\"displayCand\">";

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
                            <button onclick=\"showPopUp()\">VIEW PROFILE</button>
                            <input type=\"hidden\" value=".$row['CandidateId']" name=". $row['CandidateId']."/>
                            <input type= \"radio\" value=".$row['positionId']" name=". $row1['positionId'].">
                        </div>";
                    }
                echo "</div>";
                }
                echo "<button type=\"submit\" name=\"submitVotes\">SUBMIT</button>";
                echo "</form>";
                ?>
            
        </div>
    </div>
    <script>
        function showPopUp() {
            const popUp = document.getElementById('show');
            popUp.style.display = "flex";   
        }
        function hidePop() {
            const popUp = document.getElementById('show');
            popUp.style.display = "none";   
        }
    </script>
</body>
</html>
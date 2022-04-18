<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer</title>
    <link rel="Stylesheet" href="Stylesheet.css">
</head>
<body>

    <h1>Trainer</h1>

    <nav>

    <a href="TrainerManagement.php">Management</a>
    <a href="TrainerTrainerPage.php">Trainer</a>
    <a href="TrainerOwnerAndDog.php">Owner/Dog</a>
    <a href="TrainerClassesPage.php">Classes</a>

    </nav>
<form>
    <label for="tid"> Trainer ID </label>
    <input type="text" name="tid" id="tid" placeholder = "Enter your Trainer ID" >
    <br>
</form>

 
<?php 
$host = 'localhost';
$username = 'akabrick';
$password = 'dogtraining';
$db = 'dogtraining';
$mysqli = new mysqli($host,$username,$password,$db);

if($mysqli -> connect_errno){
    echo "failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

//when trainer id is put into search bar and search button is clicked trainer information will be displayed

if(isset($_GET['tid'])){
        $trainerid = $_GET['tid'];

$TrainerfNamesql = "SELECT TrainerFirstName FROM trainer WHERE idTrainer = $trainerid;";
$TrainerfNameResult = $mysqli->query($TrainerfNamesql);
if($TrainerfNameResult->num_rows > 0){
        while($TrainerFirstName = $TrainerfNameResult ->fetch_assoc()){
            $tFirstName =  $TrainerFirstName['TrainerFirstName'];
            echo "<label for='fName'> First Name:</label>";
            echo "<input type='text' name='fName' id='fName' placeholder = \"" .$tFirstName. "\">";
            
            echo "<br>";
        }
}

if(isset($_GET['fName'])){
        $tFirstName = $_GET['fName'];
        $updatefName = "UPDATE trainer SET TrainerFirstName = '$tFirstName' WHERE idTrainer = $trainerid;";
        $TrainerFirstNameResult = $mysqli->query($updatefName);

}
       

$TrainerlNamesql = "SELECT TrainerLastName FROM trainer where idTrainer =$trainerid;";
$TrainerlNameResult = $mysqli->query($TrainerlNamesql);
if($TrainerlNameResult->num_rows > 0){
        while($TrainerLastName = $TrainerlNameResult ->fetch_assoc()){
            $tLastName =  $TrainerLastName['TrainerLastName'];
            echo "<label for='lName'> Last Name:</label>";
            echo "<input type='text' name='lName' id='lName' placeholder = \"" .$tLastName. "\">";
            
            echo "<br>";
        }
}

if(isset($_GET['lName'])){
        $tLastName = $_GET['lName'];
        $updatelName = "UPDATE trainer SET TrainerLastName = '$tLastName' WHERE idTrainer = $trainerid; ";
        $TrainerlNameResult = $mysqli->query($updatelName);
}

$TrainerPhonesql = "SELECT TrainerPhoneNumber FROM trainer where idTrainer = $trainerid;";
$TrainerphoneResult = $mysqli->query($TrainerPhonesql);
if($TrainerphoneResult->num_rows > 0){
        while($TrainerPhoneNumber = $TrainerphoneResult ->fetch_assoc()){
            $tPhoneNum =  $TrainerPhoneNumber['TrainerPhoneNumber'];
            echo "<label for='phoneNum'> Phone Number:</label>";
            echo "<input type='text' name='phoneNum' id='phoneNum' placeholder = \"" .$tPhoneNum. "\">";
          
            echo "<br>";
        }
}

$TrainerEmailsql = "SELECT TrainerEmail FROM trainer where idTrainer = $trainerid;";
$TrainerEmailResult = $mysqli->query($TrainerEmailsql);
if($TrainerEmailResult->num_rows > 0){
        while($TrainerEmail = $TrainerEmailResult ->fetch_assoc()){
            $tEmail =  $TrainerEmail['TrainerEmail'];
            echo "<label for='email'> Email:</label>";
            echo "<input type='text' name='email' id='email' placeholder = \"" .$tEmail. "\">";
          
            echo "<br>";
        }
}

$trainerSDatesql = "SELECT TrainerStartDate FROM trainer where idTrainer = $trainerid;";
$trainerSDateResult = $mysqli->query($trainerSDatesql);
if($trainerSDateResult->num_rows > 0){
        while($TrainerSDate = $trainerSDateResult ->fetch_assoc()){
            $TSD =  $TrainerSDate['TrainerStartDate'];
            echo "<label for='sDate'> Start Date:</label>";
            echo "<input type='text' name='sDate' id='sDate' placeholder = \"" .$TSD. "\">";
            echo "<br>";
        }
}

$TrainerPaysql = "SELECT TrainerPay FROM trainer where idTrainer = $trainerid;";
$TrainerPayResult = $mysqli->query($TrainerPaysql);
if($TrainerPayResult->num_rows > 0){
        while($TrainerPay = $TrainerPayResult ->fetch_assoc()){
            $tPay =  $TrainerPay['TrainerPay'];
            echo "<label for='pay'> Pay:</label>";
            echo "<input type='text' name='pay' id='pay' placeholder = \"" .$tPay. "\">";
           
            echo "<br>";
        }
}
echo " <input type='submit' value='Update' id='updateBtn'>";
}

//Would have like to get update button working for trainers to change information as needed but did not have time to figure that out

?>



</body>
</html>
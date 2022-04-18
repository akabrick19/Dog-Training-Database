<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Stylesheet.css">
    <title>Trainer Creation</title>
</head>
<body>

    <h1>Trainer Account Creation</h1>

    <nav>
        <a href="TrainerManagement.php">Trainer Portal</a>
        <a href="LogInPage.php">Go to LogIn Page</a>
    </nav>

    <form>
        <label for="fName">First Name:</label>
        <input type="text" name="fName" id="fName">
<br>
        <label for="lName">Last Name:</label>
        <input type="text" name="lName" id="lName">
<br>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
<br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone">
<br>
        <label for="startDate">Start Date:</label>
        <input type="date" name="startDate" id="startDate">
<br>
        <label for="pay">Pay:</label>
        <input type="text" name="pay" id="pay">
<br>

        <input type="submit" value="Create">
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

//selected all attributes from trainer entities

$Trainersql = "SELECT * FROM Trainer";
$TrainerResult = $mysqli->query($Trainersql);

//Takes the inputs that are needed to create new trainer and inserts it into database
$TrainerRowCount = mysqli_num_rows($TrainerResult);


if(isset($_GET['lName']) AND isset($_GET['fName']) AND isset($_GET['phone']) AND isset($_GET['email']) AND isset ($_GET['startDate']) AND isset($_GET['pay'])){
    $insert_Trainer_sql = "INSERT INTO Trainer (idTrainer, TrainerLastName,TrainerFirstName, TrainerPhoneNumber,TrainerEmail,TrainerStartDate,TrainerPay) 
                    VALUES (\"" .$TrainerRowCount +1 . "\" ,\"" . $_GET['lName'] . "\", 
                            \"" . $_GET['fName'] . "\", \"" . $_GET['phone']. "\" ,
                            \"" . $_GET['email'] . "\", \"" . $_GET['startDate'] . "\", \"" . $_GET['pay']. "\");";
    $TrainerResult = $mysqli->query($insert_Trainer_sql);
    echo "inserted into table";
}



?>
    
</body>
</html>
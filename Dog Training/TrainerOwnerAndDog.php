<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner/Dog</title>
    <link rel="StyleSheet" href="StyleSheet.css">
</head>
<body>
    <h1>Owner / Dog</h1>

    <nav>

    <a href="TrainerManagement.php">Management</a>
    <a href="TrainerTrainerPage.php">Trainer</a>
    <a href="TrainerOwnerAndDog.php">Owner/Dog</a>
    <a href="TrainerClassesPage.php">Classes</a>

    </nav>

    <form>
        <label for="ownerSearch">Owner/ Dog search: </label>
        <input type="search" name="oSearch" id="oSearch" placeholder = "Enter Owner ID">
        <input type="submit" value="Search" id="searchBtn">

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

//when owner id is inputted into search bar and search button is pressed the needed owner and dog information will appear in table form

if(isset($_GET['oSearch'])){
    $ownerID = $_GET['oSearch'];



$OwnerInfosql = "SELECT FirstName,LastName,PhoneNumber,OwnerEmail FROM Owner WHERE idOwner = $ownerID;" ;
$ownerInfoResult = $mysqli->query($OwnerInfosql);
if($ownerInfoResult->num_rows > 0){
    echo "<table border = '1'>
    <tr>
        <th>  Owner Name </th>
        <th>  Owner Phone Number </th>
        <th>  Owner Email </th>
    </tr>";

    while($ownerInfo = $ownerInfoResult ->fetch_assoc()){
        echo "<tr>";

        echo "<td>" .$ownerInfo['FirstName']." " . $ownerInfo['LastName']. "</td>";
        echo "<td>" .$ownerInfo['PhoneNumber']. "</td>";
        echo "<td>" .$ownerInfo['OwnerEmail']. "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<br>";
}

$DogInfosql = "SELECT idDog, DogName, DogBreed, DogBirthDate, RabiesExpirationDate, BordetellaExpirationDate, DHLLPExpirationDate,VaccinationVet FROM dog WHERE Owner_idOwner = $ownerID;" ;
$DogInfoResult = $mysqli->query($DogInfosql);
if($DogInfoResult->num_rows > 0){
    echo "<table border = '1'>
    <tr>
        <th>  Dog ID </th>
        <th>  Dog Name </th>
        <th>  Dog Breed  </th>
        <th>  Dog Birthday </th>
        <th>  Rabies Expiration Date </th>
        <th>  Bordetella Expiration Date  </th>
        <th>  DHLLP Expiration Date </th>
        <th>  Vaccination Vet </th>
        
    </tr>";
    while($dogInfo = $DogInfoResult ->fetch_assoc()){
        echo "<tr>";
        echo "<td>" .$dogInfo['idDog']. "</td>";
        echo "<td>" .$dogInfo['DogName']. "</td>";
        echo "<td>" .$dogInfo['DogBreed']. "</td>";
        echo "<td>" .$dogInfo['DogBirthDate']. "</td>";
        echo "<td>" .$dogInfo['RabiesExpirationDate']. "</td>";
        echo "<td>" .$dogInfo['BordetellaExpirationDate']. "</td>";
        echo "<td>" .$dogInfo['DHLLPExpirationDate']. "</td>";
        echo "<td>" .$dogInfo['VaccinationVet']. "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
}
?>
<form>
<hr>
<label for="dogUpdate"> Enter Dog ID to update vaccinations: </label>
        <input type="search" name="dUpdate" id="dUpdate" placeholder = "Enter dog ID"> <br>

        <label for="rabies"> Rabies: </label>
        <input type="search" name="rabies" id="rabies" > <br>

        <label for="Bord"> Bordetella: </label>
        <input type="search" name="Bord" id="Bord" ><br>

        <label for="dhllp"> DHLLP: </label>
        <input type="search" name="dhllp" id="dhllp"> <br>

        <input type="submit" value="Update" id="updateBtn">

</form>
<?php

//when dog id and date are inputted the database will be updated with the inputted rabies expiration date
//unfornately did not have time to do update commands for other 2 vaccinations that are needed

if(isset($_GET['dUpdate']) AND isset($_GET['rabies'])){
    $dog =  $_GET['dUpdate'];
    
    $dra = $_GET['rabies'];
    


$updateRabies = "UPDATE dog SET RabiesExpirationDate = '$dra' WHERE idDog = $dog; ";
$RabiesResult = $mysqli->query($updateRabies);
echo "Vaccination has been updated";
}

?>

</body>
</html>
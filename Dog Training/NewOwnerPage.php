<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Stylesheet.css">
    <title>Owner Account Creation</title>
</head>
<body>
<h1>Owner Account Creation</h1>
    <nav>
        <a href="OwnerHomePage.php">Owner Portal</a>
        <a href="LogInPage.php">Go to LogIn Page</a>
    </nav>
<br>
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
        <label for="dogName">Dog Name:</label>
        <input type="text" name="dogName" id="dogName">
<br>
        <label for="dogBreed">Dog Breed:</label>
        <input type="text" name="dogBreed" id="dogBreed">
<br>
        <label for="dogBirth">Dog Birthday:</label>
        <input type="date" name="dogBirth" id="dogBirth">

        <input type="submit" value="Create" id="createBtn">

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

// selects all attributes from owner entities

$NewOwnersql = "SELECT * FROM Owner";
$ownerResult = $mysqli->query($NewOwnersql);

//selects all attributes from dog entities

$NewDogsql = "SELECT * FROM Dog";
$dogResult = $mysqli->query($NewDogsql);



$OwnerRowCount = mysqli_num_rows($ownerResult);
$DogRowCount = mysqli_num_rows($dogResult);

//Takes inputs that are needed to create new owner account and inserts them into the owner and dog entities of database

if(isset($_GET['lName']) AND isset($_GET['fName']) AND isset($_GET['phone']) AND isset($_GET['email']) AND isset ($_GET['dogName']) AND isset($_GET['dogBreed']) AND isset($_GET['dogBirth'])){
    $insert_owner_sql = "INSERT INTO owner (idOwner, FirstName,LastName,PhoneNumber,OwnerEmail,CardNumber,CardHolderName, CardExpirationDate,CVV) 
                    VALUES (\"" .$OwnerRowCount +1 . "\" ,\"" . $_GET['fName'] . "\", 
                            \"" . $_GET['lName'] . "\", \"" . $_GET['phone']. "\" ,
                            \"" . $_GET['email'] . "\", NULL , NULL , NULL, NULL);";
$insert_dog_sql = "INSERT INTO dog(iddog, DogName,DogBirthDate,DogBreed,DogNotes,DogClassHistory,RabiesExpirationDate, BordetellaExpirationDate,DHLLPExpirationDate, VaccinationVet, Owner_idOwner) 
                     VALUES (\"" .$DogRowCount +1 . "\" ,\"" . $_GET['dogName'] . "\", 
                     \"" . $_GET['dogBirth'] . "\", \"" . $_GET['dogBreed']. "\" ,
                                    NULL, NULL, NULL, NULL, NULL, NULL, \"" .$OwnerRowCount. "\");";
    $OwnerResult = $mysqli->query($insert_owner_sql);
    echo "inserted into owner table";
    $dogResult = $mysqli->query($insert_dog_sql);
    echo "inserted into dog table";
}


?>
</body>
</html>
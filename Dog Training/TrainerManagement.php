<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Stylesheet.css">
    <title>Management</title>
</head>
<body>
<nav>
<a href="LogInPage.php">Log Out</a>
</nav> 

    <h1>Dog Training - Trainer Portal</h1>

<nav>

<a href="TrainerManagement.php">Management</a>
<a href="TrainerTrainerPage.php">Trainer</a>
<a href="TrainerOwnerAndDog.php">Owner/Dog</a>
<a href="TrainerClassesPage.php">Classes</a>

</nav>
 

<form>

    <label for="classSearch">Search</label>
    <input type="search" name="classSearch" id = "classSearch" placeholder = "Enter Class ID">

    <input type="submit" name="search" value="Search">

    <br>

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

//once class id was inputted into search bar the class info will appear in a table

if(isset($_GET['classSearch'])){
    $classid = $_GET['classSearch'];


$SearchClassSQL = "SELECT ClassStartDate,ClassTime,ClassTrainer,ClassSpotsFilled, Classtype_idClassType FROM class
                    WHERE idclass = $classid;";
$searchclassidresult = $mysqli->query($SearchClassSQL);
if($searchclassidresult->num_rows > 0){
    echo "<table border = '1'>
    <tr>
        <th>  Class ID </th>
        <th>  Class Name </th>
        <th>  Class Start Date </th>
        <th>  Class Time </th>
        <th>  Spots Filled </th>
        <th>  Class Trainer </th>
        
    </tr>";

    while($SCID = $searchclassidresult ->fetch_assoc()){
        echo "<tr>";
        echo "<td>" .$classid. "</td>";
        $classTypeID = $SCID['Classtype_idClassType'];
        $FindClassNameSQL = "SELECT ClassName FROM ClassType WHERE idClassType = $classTypeID;";
        $FindClassResult = $mysqli->query($FindClassNameSQL);
        if($FindClassResult->num_rows > 0){
            while($FCR = $FindClassResult ->fetch_assoc()){
                echo "<td>" .$FCR['ClassName']. "</td>";
                
            }

        

    }
   
    echo "<td>" .$SCID['ClassStartDate']. "</td>";
    echo "<td>" .$SCID['ClassTime']. "</td>";
    echo "<td>" .$SCID['ClassSpotsFilled']. "</td>";   
    echo "<td>" .$SCID['ClassTrainer']. "</td>";   
   

    
    }
    echo "</table>";

    
    } 
}

?>



</form>

<hr>

<form>

<label for="cName">Class Name:</label>
<input type="text" name="cName">
<br>

<label for="sDate">Start Date:</label>
<input type="date" name="sDate">
<br>

<label for = "cDay"> Day: </label>
<input type = "text" name = "cDay">
<br>

<label for="time">Time:</label>
<input type="time" name="time">
<br>

<label for="spotsAvail">Spots Available:</label>
<input type="text" name="spotsAvailable">
<br>

<label for="trainer">Trainer:</label>
<input type="text" name="trainerName">
<br>

<input type="submit" name="addBtn" value="Add Class">
<br>

<?php

//when class id is inputted into search bar and delete button is pressed the class will be deleted from database

$Class = "SELECT * FROM Class";;
$ClassResults = $mysqli->query($Class);
 
$ClassRowCount = mysqli_num_rows($ClassResults);
$spotsfilled = 0;

echo "<hr>";
echo "<label for='deleteBtn'> Enter the class ID that needs to be deleted:</label>";
echo "<input type='text' name='delete'>";
echo "<input type='submit' name='deleteBtn' value='Delete'>";
if(isset($_GET['delete'])){
$DeletedClass = $_GET['delete'];
$DeleteClass = "DELETE FROM Class where idClass = $DeletedClass;";
$DeleteClassResult = $mysqli->query($DeleteClass);
echo "class with id ". $DeletedClass. " has been deleted";
}

//was not able to get add class working on this page unfortunately. If we had more time then we would have worked to get it done

?>
</form>
    
</body>


</html>
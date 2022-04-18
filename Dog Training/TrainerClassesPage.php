<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>
    <link rel="StyleSheet" href="StyleSheet.css">
</head>
<body>
    <h1>Classes</h1>

    <nav>

    <a href="TrainerManagement.php">Management</a>
    <a href="TrainerTrainerPage.php">Trainer</a>
    <a href="TrainerOwnerAndDog.php">Owner/Dog</a>
    <a href="TrainerClassesPage.php">Classes</a>

    </nav>

    <form>
        <label for="classSearch">Find Classes: </label>
        <input type="search" name="classSearch" id="classSearch" placeholder = "Enter Class ID">
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

//once class id is inputted into search bar that class information will appear, including the dogs in class and how many sessions each has attended

if(isset($_GET['classSearch'])){
    $classID = $_GET['classSearch'];
    

$SessionandDogIDsql = "SELECT SessionCheckIn,Dog_idDog FROM Registrations WHERE Class_idClass = $classID;" ;
$SessionandDogIDResult = $mysqli->query($SessionandDogIDsql);
if($SessionandDogIDResult->num_rows > 0){
    echo "<table border = '1'>
    <tr>
        <th>  Dog Names </th>
        <th>  Owner Names </th>
        <th>  Sessions Attended </th>
        <th>  Action </th>
    </tr>";
    while($SDID = $SessionandDogIDResult ->fetch_assoc()){
        echo "<tr>";
        $dogName = $SDID['Dog_idDog'];
        $DogNamesql = "SELECT DogName FROM Dog WHERE idDog = $dogName;" ;
        $DogNameResult = $mysqli->query($DogNamesql);
        if($DogNameResult->num_rows > 0){
            while($dName = $DogNameResult ->fetch_assoc()){
                echo "<td>" .$dName['DogName']. "</td>";

            }
        }
        $OwnerIDsql = "SELECT Owner_idOwner FROM Dog WHERE idDog = $dogName;" ;
        $OwnerIDResult = $mysqli->query($OwnerIDsql);
        if($OwnerIDResult->num_rows > 0){
            while($oID = $OwnerIDResult ->fetch_assoc()){
                $OwnerName = $oID['Owner_idOwner'];

                $OwnerNamesql = "SELECT FirstName,LastName FROM owner WHERE idOwner = $OwnerName;" ;
                $OwnerNameResult = $mysqli->query($OwnerNamesql);
                if($OwnerNameResult->num_rows > 0){
                    while($oName = $OwnerNameResult ->fetch_assoc()){
                        echo "<td>" .$oName['FirstName']." " . $oName['LastName']. "</td>";
        
                    }
                }

            }
        }
    
        echo "<td>" .$SDID['SessionCheckIn']. "</td>";
        echo "<td> <input type= 'submit' value='Check In'> </td>";
        echo "</tr>";

    }
    echo "</table>";
}

}

//Would have liked to get the check in buttons to work but unfortanately did not have time

?>
    
</body>
</html>
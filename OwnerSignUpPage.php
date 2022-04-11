<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
<h1>Dog Training - Sign Up</h1>

<nav>

<a href="OwnerHomePage.php">Home</a>
<a href="OwnerMyAccountPage.php">My Account</a>
<a href="OwnerClassesPage.php">Classes</a>
<a href="OwnerSignUpPage.php">Sign Up</a>
    
    </nav>

    <br>

    <form>

        <label for="classSearch"> Class ID:</label>
        <input type="search" name="classSearch" id="classSearch">
        <input type="submit" value="Search" id="classSearchBtn">

    
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

//$classid = $_GET['classSearch'];
$ClassSearch = "SELECT ClassStartDate,ClassDayOfWeek,ClassTime,ClassTrainer FROM Class WHERE classtype_idClassType = 2";
$ClassResult = $mysqli->query($ClassSearch);

if($ClassResult->num_rows > 0){
    echo "<table border = '1'>
    <tr>
        <th>  Start Date </th>
        <th>  Class Time </th>
        <th>  Day of Week</th>
        <th>  Trainer </th>
        <th>  Action </th>
    </tr>";
    while($Classes = $ClassResult ->fetch_assoc()){
        echo "<tr>";
        echo "<td>" .$Classes['ClassStartDate']. "</td>";
        echo "<td>" .$Classes['ClassTime']. "</td>";
        echo "<td>" .$Classes['ClassDayOfWeek']. "</td>";
        echo "<td>" .$Classes['ClassTrainer']. "</td>";
        echo "<td> <input type= 'submit' value='Register'> </td>";
        echo "</tr>";
    }

    echo "</table>";
}

/*
$classid = null; 
if(isset($_GET['classSearch']) == "Puppy 1"){
    $Classid = 1;
}

if(isset($_GET['classSearch']) == "Puppy 2"){
    $Classid = 2;
}  
 
if(isset($_GET['classSearch']) == "Adult 1"){
    $Classid = 3;
}  
if(isset($_GET['classSearch']) == "Adult 2"){
    $Classid = 4;
} 
if(isset($_GET['classSearch']) == "AKC CGC"){
    $Classid = 5;
}   
if(isset($_GET['classSearch']) == "Private"){
    $Classid = 6;
}

echo $Classid;

*/


?>


</body>
</html>
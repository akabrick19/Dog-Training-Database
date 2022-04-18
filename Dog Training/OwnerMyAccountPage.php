<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="Stylesheet.css">
    <title>My Account</title>
</head>
<body>

    <h1>My Account</h1>

<nav>

<a href="OwnerHomePage.php">Home</a>
<a href="OwnerMyAccountPage.php">My Account</a>
<a href="OwnerClassesPage.php">Classes</a>
<a href="OwnerSignUpPage.php">Sign Up</a>
    
    </nav>
<form>
    <label for="oid"> Owner ID </label>
    <input type="text" name="oid" id="oid" placeholder = "Enter your Owner ID" >
    <br>
</form>
<form>
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
// if an input was put into the oid (owner id search bar) then the owner information of that id will show up

if(isset($_GET['oid'])){
        $ownerid = $_GET['oid'];
      
        

$ownerfNamesql = "SELECT FirstName FROM owner WHERE idOwner =$ownerid";
$ownerfNameResult = $mysqli->query($ownerfNamesql);
if($ownerfNameResult->num_rows > 0){
        while($ownerFirstName = $ownerfNameResult ->fetch_assoc()){
            $oFirstName =  $ownerFirstName['FirstName'];
            echo "<label for='fName'> First Name:</label>";
            echo "<input type='text' name='fName' id='fName' placeholder = \"" .$oFirstName. "\">";
            echo "<br>";
            
        
         }
        
}
        

$ownerlNamesql = "SELECT LastName FROM owner where idOwner = $ownerid";
$ownerlNameResult = $mysqli->query($ownerlNamesql);
if($ownerlNameResult->num_rows > 0){
        while($ownerLastName = $ownerlNameResult ->fetch_assoc()){
            $oLastName =  $ownerLastName['LastName'];
            echo "<label for='lName'> Last Name:</label>";
            echo "<input type='text' name='lName' id='lName' placeholder = \"" .$oLastName. "\">";
            echo "<br>";
        }
}


$ownerphonesql = "SELECT PhoneNumber FROM owner where idOwner = $ownerid";
$ownerphoneResult = $mysqli->query($ownerphonesql);
if($ownerphoneResult->num_rows > 0){
        while($ownerPhoneNumber = $ownerphoneResult ->fetch_assoc()){
            $oPhoneNum =  $ownerPhoneNumber['PhoneNumber'];
            echo "<label for='phoneNum'> Phone Number:</label>";
            echo "<input type='text' name='phoneNum' id='phoneNum' placeholder = \"" .$oPhoneNum. "\">";
            echo "<br>";
        }
}

$owneremailsql = "SELECT OwnerEmail FROM owner where idOwner = $ownerid";
$owneremailResult = $mysqli->query($owneremailsql);
if($owneremailResult->num_rows > 0){
        while($ownerEmail = $owneremailResult ->fetch_assoc()){
            $oEmail =  $ownerEmail['OwnerEmail'];
            echo "<label for='owEmail'> Email:</label>";
            echo "<input type='text' name='owEmail' id='owEmail' placeholder = \"" .$oEmail. "\">";
            echo "<br>";
        }
}

$ownercNumsql = "SELECT CardNumber FROM owner where idOwner = $ownerid";
$ownercNumResult = $mysqli->query($ownercNumsql);
if($ownercNumResult->num_rows > 0){
        while($ownercNum = $ownercNumResult ->fetch_assoc()){
            $oCNum =  $ownercNum['CardNumber'];
            echo "<label for='cNum'> Card Number:</label>";
            echo "<input type='text' name='cNum' id='cNum' placeholder = \"" .$oCNum. "\">";
            echo "<br>";
        }
}

$ownercNamesql = "SELECT CardHolderName FROM owner where idOwner = $ownerid";
$ownercNameResult = $mysqli->query($ownercNamesql);
if($ownercNameResult->num_rows > 0){
        while($ownercName = $ownercNameResult ->fetch_assoc()){
            $oCName =  $ownercName['CardHolderName'];
            echo "<label for='cName'> CardHolder Name:</label>";
            echo "<input type='text' name='cName' id='cName' placeholder = \"" .$oCName. "\">";
            echo "<br>";
        }
        
}

$ownercExpirationsql = "SELECT CardExpirationDate FROM owner where idOwner = $ownerid";
$ownercExpirationResult = $mysqli->query($ownercExpirationsql);
if($ownercExpirationResult->num_rows > 0){
        while($ownercExpiration = $ownercExpirationResult ->fetch_assoc()){
            $oCExpire =  $ownercExpiration['CardExpirationDate'];
            echo "<label for='Expire'> Card Expiration Date:</label>";
            echo "<input type='text' name='Expire' id='Expire' placeholder = \"" .$oCExpire. "\">";
            echo "<br>";
        }
}

$ownercvvsql = "SELECT CVV FROM owner where idOwner = $ownerid";
$ownercvvResult = $mysqli->query($ownercvvsql);
if($ownercvvResult->num_rows > 0){
        while($ownercvv = $ownercvvResult ->fetch_assoc()){
            $oCVV =  $ownercvv['CVV'];
            echo "<label for='cvv'> CVV:</label>";
            echo "<input type='text' name='cvv' id='cvv' placeholder = \"" .$oCVV. "\">";
            echo "<br>";
        }
  }

}
// Next 2 if statements were supposed to update first and last name but could not get these to work for some reason in time for demo

if(isset($_GET['fName'])){
    $updatefNameTo = $_GET['fName'];
    $updatefName = "UPDATE Owner SET FirstName = '$updatefNameTo' WHERE idOwner = 37; ";
    $ownerfNameResult = $mysqli->query($updatefName);
    echo "First Name has been updated";
    
}

if(isset($_GET['lName'])){
    $updatefNameTo = $_GET['lName'];
    $updatefName = "UPDATE Owner SET LastName = '$updatefNameTo' WHERE idOwner = 37; ";
    $ownerfNameResult = $mysqli->query($updatefName);
    echo "Last Name has been updated";
    
}
echo " <input type='submit' value='Update' id='updateBtn'>";

?>

</form>
<?php

// if an input was put into the oid (owner id search bar) then the dog information of that id will show up as well

if(isset($_GET['oid'])){
        $findDogID = $_GET['oid'];


$FindOwnerDogInfo = "SELECT DogName,DogBreed,DogBirthdate FROM dog where Owner_idOwner = $findDogID";
$FindOwnerDogResult = $mysqli->query($FindOwnerDogInfo);
if($FindOwnerDogResult->num_rows > 0){
        echo "<table border = '1'>
        <tr>
            <th> Name </th>
            <th> Breed </th>
            <th> BirtDate </th>
        </tr>";
        while($OwnerDogInfo = $FindOwnerDogResult ->fetch_assoc()){
            echo "<br>";
            echo "<tr>";
            echo "<td>" .$OwnerDogInfo['DogName']. "</td>";
            echo "<td>" .$OwnerDogInfo['DogBreed']. "</td>";
            echo "<td>" .$OwnerDogInfo['DogBirthdate']. "</td>";
            echo "</tr>";
        }

        echo "</table>";
}
}




?>






    </table>
    
</body>
</html>
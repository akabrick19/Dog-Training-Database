<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
</head>
<body>

    <h1>My Account</h1>

<nav>

    <a href="index.html">Home</a>
    <a href="myAccount.html">My Account</a>
    <a href="classes.html">Classes</a>
    <a href="trainers.html">Trainers</a>
    <a href="signUp.html">Sign Up</a>
    
    </nav>
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

$ownerfNamesql = "SELECT FirstName FROM owner WHERE idOwner = 32";
$ownerfNameResult = $mysqli->query($ownerfNamesql);
if($ownerfNameResult->num_rows > 0){
        while($ownerFirstName = $ownerfNameResult ->fetch_assoc()){
            $oFirstName =  $ownerFirstName['FirstName'];
        }
}

if(isset($_GET['fName'])){
        $oFirstName = $_GET['fName'];
        $updatefName = "UPDATE Owner SET FirstName = '$oFirstName' WHERE idOwner = 32; ";
        $ownerfNameResult = $mysqli->query($updatefName);
}
          

$ownerlNamesql = "SELECT LastName FROM owner where idOwner = 33";
$ownerlNameResult = $mysqli->query($ownerlNamesql);
if($ownerlNameResult->num_rows > 0){
        while($ownerLastName = $ownerlNameResult ->fetch_assoc()){
            $oLastName =  $ownerLastName['LastName'];
        }
}
/*if(isset($_GET['lName'])){
        $oLastName = $_GET['lName'];
        $updatelName = "UPDATE Owner SET LastName = '$oLastName' WHERE idOwner = 32; ";
        $ownerlNameResult = $mysqli->query($updatelName);

}
*/
$ownerphonesql = "SELECT PhoneNumber FROM owner where idOwner = 32";
$ownerphoneResult = $mysqli->query($ownerphonesql);
if($ownerphoneResult->num_rows > 0){
        while($ownerPhoneNumber = $ownerphoneResult ->fetch_assoc()){
            $oPhoneNum =  $ownerPhoneNumber['PhoneNumber'];
        }
}

$owneremailsql = "SELECT OwnerEmail FROM owner where idOwner = 32";
$owneremailResult = $mysqli->query($owneremailsql);
if($owneremailResult->num_rows > 0){
        while($ownerEmail = $owneremailResult ->fetch_assoc()){
            $oEmail =  $ownerEmail['OwnerEmail'];
        }
}

$ownercNumsql = "SELECT CardNumber FROM owner where idOwner = 32";
$ownercNumResult = $mysqli->query($ownercNumsql);
if($ownercNumResult->num_rows > 0){
        while($ownercNum = $ownercNumResult ->fetch_assoc()){
            $oCNum =  $ownercNum['CardNumber'];
        }
}

$ownercNamesql = "SELECT CardHolderName FROM owner where idOwner = 32";
$ownercNameResult = $mysqli->query($ownercNamesql);
if($ownercNameResult->num_rows > 0){
        while($ownercName = $ownercNameResult ->fetch_assoc()){
            $oCName =  $ownercName['CardHolderName'];
        }
}

$ownercExpirationsql = "SELECT CardExpirationDate FROM owner where idOwner = 32";
$ownercExpirationResult = $mysqli->query($ownercExpirationsql);
if($ownercExpirationResult->num_rows > 0){
        while($ownercExpiration = $ownercExpirationResult ->fetch_assoc()){
            $oCExpire =  $ownercExpiration['CardExpirationDate'];
        }
}

$ownercvvsql = "SELECT CVV FROM owner where idOwner = 32";
$ownercvvResult = $mysqli->query($ownercvvsql);
if($ownercvvResult->num_rows > 0){
        while($ownercvv = $ownercvvResult ->fetch_assoc()){
            $oCVV =  $ownercvv['CVV'];
        }
}

/* if(isset($_GET['lName']) OR isset($_GET['fName']) OR isset($_GET['phone']) OR isset($_GET['email']) OR isset ($_GET['cardNum']) OR isset($_GET['cardName']) OR isset($_GET['expireDate']) OR isset($_GET['cvv'])){
        $oFirstName = $_GET['fName'];
        $oLastName = $_GET['lName'];
        //$SetPhoneTo = $_GET['phone'];
        //$SetEmailTo = $_GET['email'];
        //$SetCardNumTo = $_GET['cardNum'];
        //$SetCardNameTo = $_GET['cardName'];
        //$SetExpireDateTo = $_GET['expireDate'];
        //$SetCVVTo = $_GET['cvv'];

        $updatefName = "UPDATE Owner SET FirstName = '$oFirstName' WHERE idOwner = 32; ";
        $updatelName = "UPDATE owner SET LastName = '$oLastName' WHERE idOwner = 32; ";
        //$updatePhone = "UPDATE owner SET PhoneNumber = $SetPhoneTo WHERE idOwner = 32; ";
        //$updateEmail = "UPDATE owner SET OwnerEmail = $SetEmailTo WHERE idOwner = 32; ";
        //$updateCardNum = "UPDATE owner SET CardNumber = $SetCardNumTo WHERE idOwner = 32; ";
        //$updateCardName = "UPDATE owner SET CardHolderName = $SetCardNameTo WHERE idOwner = 32; ";
        //$updateExpireDate = "UPDATE owner SET CardExpirationDate = $SetExpireDateTo WHERE idOwner = 32; ";
        //$updateCVV = "UPDATE owner SET CVV = $SetCVVTo WHERE idOwner = 32; ";

        $ownerfNameResult = $mysqli->query($updatefName);
        $ownerlNameResult = $mysqli->query($updatelName);
        //$ownerphoneResult = $mysqli->query($updatePhone);
        //$owneremailResult = $mysqli->query($updateEmail);
        //$ownercNumResult = $mysqli->query($updateCardNum);
        //$ownercNameResult = $mysqli->query($updateCardName);
        //$ownercExpirationResult = $mysqli->query($updateExpireDate);
        //$ownercvvResult = $mysqli->query($updateCVV);
        
}
*/
?>

    <form>

        <label for="fName"> First Name:</label>
        <input type="text" name="fName" id="fName" placeholder = <?php echo $oFirstName; ?> >
<br>
        <label for="lName"> Last Name:</label>
        <input type="text" name="lName" id="lName" placeholder = <?php echo $oLastName; ?> >
<br>
        <label for="phone"> Phone Number:</label>
        <input type="text" name="phone" id="phone" placeholder = <?php echo $oPhoneNum; ?> >
<br>
        <label for="email"> Email:</label>
        <input type="text" name="email" id="email" placeholder = <?php echo $oEmail; ?> >
<br>
        <label for="cardNum"> Card Number:</label>
        <input type="text" name="cardNum" id="cardNum" placeholder= <?php echo $oCNum; ?> > 
<br>
        <label for="cardName"> Card Holder Name:</label>
        <input type="text" name="cardName" id="cardName" placeholder = <?php echo $oCName; ?> >
<br>
        <label for="expireDate"> Expiration Date:</label>
        <input type="date" name="expireDate" id="expireDate" placeholder = <?php echo $oCExpire; ?> >
<br>
        <label for="cvv"> CVV:</label>
        <input type="text" name="cvv" id="cvv" placeholder = <?php echo $oCVV; ?> > 
<br>
        <input type="submit" value="Update" name="updateBtn">


    </form>




    <table style="border: 1px solid black;">
        <tr style="border: 1px solid black;">
            <th style="border: 1px solid black;">Name</th>
            <th style="border: 1px solid black;">Breed</th>
            <th style="border: 1px solid black;">Birth Date</th>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;">Max</td>
            <td style="border: 1px solid black;">German Shepard</td>
            <td style="border: 1px solid black;">8/9/20</td>
        </tr>




    </table>
    
</body>
</html>
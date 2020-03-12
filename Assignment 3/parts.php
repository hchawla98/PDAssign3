<?php 
$error = '';

if ( ! empty($_POST)) {

$vendorNo = $_POST['vendorNo'];
$description = $_POST['description'];
$onHand = $_POST['onHand'];
$onOrder = $_POST['onOrder'];
$cost = $_POST['cost'];
$listPrice = $_POST['listPrice'];



if($vendorNo == ''){
        $error .= "Vendor No is required <br/>";
    }

if($description == ''){
        $error .= "Description is required <br/>";
    }

if($onHand == ''){
        $error .= "On Hand is required <br/>";
    }

if($onOrder == ''){
        $error .= "On Order is required <br/>";
    }

if($cost == ''){
        $error .= "Cost is required <br/>";
    }

if($listPrice == ''){
        $error .= "List Price is required <br/>";
    }
if(!is_numeric($vendorNo)){
        $error .= 'Vendor No must be a number. </br>';
    }

if(!is_numeric($onHand)){
        $error .= 'Vendor No must be a number. </br>';
    }

if(!is_numeric($onOrder)){
        $error .= 'Vendor No must be a number. </br>';
    }

    if(!is_numeric($cost)){
        $error .= 'Vendor No must be a number. </br>';
    }

    if(!is_numeric($listPrice)){
        $error .= 'Vendor No must be a number. </br>';
    }

/*
$sql = "insert into order_data ( name, email,  password, phone, post_code, lunch, tickets, campus) VALUES ('".$name."', '".$email."', '".$password."', '".$phone."', '".$postcode."', '".$lunch."', '".$tickets."', '".$campus."')";
*/

include('connection.php');

$dbConnection = ConnectToDatabase();

$vendorSql = "SELECT * from Vendors WHERE VendorNo = $vendorNo";

$preparedVendorSQL = $dbConnection->prepare($vendorSql);

$preparedVendorSQL->execute();

$vendorfound = false;

while($myrow = $preparedVendorSQL->fetch()){
   $vendorfound = true;
}
if(!$vendorfound){
    $error .= 'Vendor No must be valid. </br>';
}





}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Parts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- This is how you link your external JS file to your HTML -->
    
</head>
<body>

  <form name="myform" method="Post" onsubmit=""  action="parts.php" >
    <label>VendorNo</label>
    <input id="vendorNo" placeholder="" type="text" name="vendorNo"><br/>

    <label>Description</label>
    <input id="description" placeholder="" type="text" name="description"><br/>

    <label>On Hand</label>
    <input id="onHand" placeholder="" type="number" name="onHand"><br/>

    <label>On Order</label>
    <input id="onOrder" placeholder="" type="number" name="onOrder"><br/>

    <label>Cost</label>
    <input id="cost" placeholder="" type="number" name="cost"><br/>

    <label>List Price</label>
    <input id="listPrice" placeholder="" type="number" name="listPrice"><br/>
    

    <br/><br/>

    <input type="submit" value="Submit">
    
  </form>  
  
  <div class="formData">

  <?php if ((!empty($_POST))&&$error == ''):

  $sql = "insert into Parts ( VendorNo, Description,  OnHand, OnOrder, Cost, ListPrice) VALUES ('$vendorNo', '$description', '$onHand', '$onOrder', '$cost', '$listPrice')";




$preparedSQL = $dbConnection->prepare($sql);

$preparedSQL->execute();
 ?>

                VendorNo: <?php echo $vendorNo; ?> <br>
                Description: <?php echo $description; ?><br>
                OnHand: <?php echo $onHand; ?><br>
                OnOrder: <?php echo $onOrder; ?><br>
                Cost: $<?php echo $cost; ?><br>
                List Price: $<?php echo $listPrice; ?><br>

  <?php else: ?>
    <p id="formResult"><?php echo $error; ?></p>
  <?php endif; ?>



  </div>
</body>
</html>





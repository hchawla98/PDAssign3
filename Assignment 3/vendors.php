<?php 
$error = '';

if ( ! empty($_POST)) {

$vendorNo = $_POST['vendorNo'];
$vendorName = $_POST['vendorName'];
$address = $_POST['address'];
$city = $_POST['city'];
$province = $_POST['province'];
$postCode = $_POST['postCode'];
$country = $_POST['country'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];




if($vendorNo == ''){
        $error .= "Vendor No is required <br/>";
    }

if($vendorName == ''){
        $error .= "Vendor Name is required <br/>";
    }

if($address == ''){
        $error .= "Address is required <br/>";
    }

if($city == ''){
        $error .= "City is required <br/>";
    }

if($province == ''){
        $error .= "Province is required <br/>";
    }

if($postCode == ''){
        $error .= "PostCode is required <br/>";
    }

if($country == ''){
        $error .= "PostCode is required <br/>";
    }
if($phone == ''){
        $error .= "PostCode is required <br/>";
    }
if($fax == ''){
        $error .= "PostCode is required <br/>";
    }
if(!is_numeric($vendorNo)){
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
if($vendorfound){
    $error .= 'Vendor No already exists. </br>';
}


}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vendors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- This is how you link your external JS file to your HTML -->
    
</head>
<body>

  <form name="myform" method="Post" onsubmit=""  action="vendors.php" >
    <label>Vendor No</label>
    <input id="vendorNo" placeholder="" type="text" name="vendorNo"><br/>

    <label>Vendor Name</label>
    <input id="vendorName" placeholder="" type="text" name="vendorName"><br/>

    <label>Address</label>
    <input id="address" placeholder="" type="text" name="address"><br/>

    <label>City</label>
    <input id="city" placeholder="" type="text" name="city"><br/>

    <label>Province</label>
    <input id="province" placeholder="" type="text" name="province"><br/>

    <label>PostCode</label>
    <input id="postCode" placeholder="" type="text" name="postCode"><br/>

    <label>Country</label>
    <input id="country" placeholder="" type="text" name="country"><br/>
    
    <label>Phone</label>
    <input id="phone" placeholder="" type="number" name="phone"><br/>

    <label>Fax</label>
    <input id="fax" placeholder="" type="number" name="fax"><br/>

    <br/><br/>

    <input type="submit" value="Submit">
    
  </form>  
  
  <div class="formData">

  <?php if ((!empty($_POST))&&$error == ''):

  $sql = "insert into Vendors ( VendorNo, VendorName,  Address1, City, Prov, PostCode, Country, Phone, Fax) VALUES ('$vendorNo', '$vendorName', '$address', '$city', '$province', '$postCode','$country','$phone','$fax')";




$preparedSQL = $dbConnection->prepare($sql);

$preparedSQL->execute();
 ?>

                VendorNo: <?php echo $vendorNo; ?> <br>
                VendorName: <?php echo $vendorName; ?><br>
                Address: <?php echo $address; ?><br>
                City: <?php echo $city; ?><br>
                Province: $<?php echo $province; ?><br>
                PostCode: $<?php echo $postCode; ?><br>
                Country: $<?php echo $country; ?><br>
                Phone: $<?php echo $phone; ?><br>
                Fax: $<?php echo $fax; ?><br>



  <?php else: ?>
    <p id="formResult"><?php echo $error; ?></p>
  <?php endif; ?>



  </div>
</body>
</html>





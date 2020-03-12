<?php

	include("connection.php");

	function FillVendorTable()
	{

		$tableBodyText = "";

		$connection = ConnectToDatabase();

		$querySelect = "SELECT VendorNo,VendorName,Address1,City,Prov,PostCode,Country,Phone,Fax FROM Vendors";
		$preparedQuerySelect = $connection -> prepare($querySelect);
		$preparedQuerySelect -> execute();

		while ($row = $preparedQuerySelect -> fetch())
		{

			$vendorNo = number_format($row['VendorNo'],0);
			$vendorName = $row['VendorName'];
			$address1 = $row['Address1'];
			$city = $row['City'];
			$prov = $row['Prov'];
			$postCode = $row['PostCode'];
			$country = $row['Country'];
			$phone = $row['Phone'];
			$fax = $row['Fax'];

			$tableBodyText .= "<tr>";
			$tableBodyText .= "<td>$vendorNo</td>";
			$tableBodyText .= "<td>$vendorName</td>";
			$tableBodyText .= "<td>$address1</td>";
			$tableBodyText .= "<td>$city</td>";
			$tableBodyText .= "<td>$prov</td>";
			$tableBodyText .= "<td>$postCode</td>";
			$tableBodyText .= "<td>$country</td>";
			$tableBodyText .= "<td>$phone</td>";
			$tableBodyText .= "<td>$fax</td>";
			$tableBodyText .= "</tr>";

		}

		echo $tableBodyText;

	}


	function CreateVendorTableHeader()
	{
		$text = "Vendors";
		$text = "<tr id='tableHeader'>";
		$text .= "<th>VendorNo</th>";
		$text .= "<th>VendorName</th>";
		$text .= "<th>Address</th>";
		$text .= "<th>City</th>";
		$text .= "<th>Province</th>";
		$text .= "<th>PostCode</th>";
		$text .= "<th>Country</th>";
		$text .= "<th>Phone</th>";
		$text .= "<th>Fax</th>";
		$text .= "</tr>";

		echo $text;

	}
	function FillPartsTable()
	{

		$tableBodyText = "";

		$connection = ConnectToDatabase();

		$querySelect = "SELECT PartID,VendorNo,Description,OnHand,OnOrder,Cost,ListPrice FROM Parts";
		$preparedQuerySelect = $connection -> prepare($querySelect);
		$preparedQuerySelect -> execute();

		while ($row = $preparedQuerySelect -> fetch())
		{

			$partId = number_format($row['PartID'],0);
			$vendorNo = $row['VendorNo'];
			$description = $row['Description'];
			$onHand = $row['OnHand'];
			$onOrder = $row['OnOrder'];
			$cost = $row['Cost'];
			$listPrice = $row['ListPrice'];

			
			$tableBodyText .= "<tr>";
			$tableBodyText .= "<td>$partId</td>";
			$tableBodyText .= "<td>$vendorNo</td>";
			$tableBodyText .= "<td>$description</td>";
			$tableBodyText .= "<td>$onHand</td>";
			$tableBodyText .= "<td>$onOrder</td>";
			$tableBodyText .= "<td>$cost</td>";
			$tableBodyText .= "<td>$listPrice</td>";
			$tableBodyText .= "</tr>";

		}

		echo $tableBodyText;

	}


	function CreatePartsTableHeader()
	{

		$text = "Parts";
		$text = "<tr id='tableHeader'>";
		$text .= "<th>PartID</th>";
		$text .= "<th>VendorNo</th>";
		$text .= "<th>Description</th>";
		$text .= "<th>OnHand</th>";
		$text .= "<th>OnOrder</th>";
		$text .= "<th>Cost</th>";
		$text .= "<th>ListPrice</th>";
		$text .= "</tr>";

		echo $text;

	}

?>




<html>

	<head>

		<link rel="stylesheet" href="css.css">

		<?php

			require("TableData.php");



		?>

	</head>

	<body>
		<h1>Parts</h1>
		<table>
			<?php
			
				CreatePartsTableHeader();
				FillPartsTable();

			?>
		</table>
		<main>
			<br/>
			<br/>
			<br/>
			<br/>
		</main>


		<h1>Vendors</h1>
		<table>
			<?php

				CreateVendorTableHeader();
				FillVendorTable();

			?>


		</table>

	</body>

</html>




<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PR Realty Advising :: Insert</title>
    	<meta charset="utf-8">
    	<link rel="stylesheet" href="../prrealty.css">
    	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	</head>
	<body>
		<header>
	        <h2>Welcome to PR Realty Advising :: Insert new customer</h2>
	        <p id="artist">Photo by Jeffrey Czum from <a href="https://www.pexels.com/photo/four-colourful-houses-2501965/">Pexels</a></p>
	    </header>
		<div id="wrapper">    
	    <nav>
	       	<ul>
		        <li><a href="../index.html">Home</a></li>
		        <li><a href="connect.php">Connect to Database</a></li>
		        <li><a href="createdb.php">Create a Database</a></li>
		        <li><a href="createtable.php">Create Table</a></li>
    	        <li><a href="../deletetable.html">Delete Tables</a></li>		        
		        <li><a href="../edit.html">Edit Table</a>	
		            <ul>
		                <li><a href="../insert.html">Insert data</a></li>
		                <li><a href="../update.html">Update data</a></li>
		                <li><a href="../delete.html">Delete data</a></li>
		            </ul>    
		        </li>
		        <li><a href="../select.html">SELECT queries</a></li>
		    </ul>
	    </nav>
	    <main>
			<?php
				$servername ="localhost";
				$dbname = "PRRealtyAdvising";
				$username = "root";
				$password = "";

				try {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password );
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					echo "<p style='color:green'>Connection successful</p>";
				}
				catch (PDOException $err) {
					echo "<p style='color:red'>Connection failed: " . $err->getMessage() . "</p>\r\n";
				}


				try {

					$sql="INSERT INTO Customer (CustomerID, FirstName, LastName, PhoneNumber, Email, Occupation) VALUES (:customerID, :fname, :lname, :phone, :email, :occupation);";
					$stmnt = $conn->prepare($sql);
					$stmnt->bindParam(':customerID', $_POST['customerID']);
					$stmnt->bindParam(':fname', $_POST['fname']); 
					$stmnt->bindParam(':lname', $_POST['lname']);
					$stmnt->bindParam(':phone', $_POST['phone']);
					$stmnt->bindParam(':email', $_POST['email']);
					$stmnt->bindParam(':occupation', $_POST['occupation']);

					$stmnt->execute();

					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					echo "<p style='color:green'>Data inserted into Customers table</p>";
				}
				catch (PDOException $err ) {
					echo "<p style='color:red'>Data insertion into Customers table failed: " . $err->getMessage() . "</p>\r\n";
				}

				try {

					$sql="INSERT INTO PostalCodes (PostalCode, StreetName, Municipality, Province) VALUES (:postalcode, :streetname, :municipality, :province);";
					$stmnt = $conn->prepare($sql);
					$stmnt->bindParam(':postalcode', $_POST['postalcode']);
					$stmnt->bindParam(':streetname', $_POST['streetname']); 
					$stmnt->bindParam(':municipality', $_POST['municipality']);
					$stmnt->bindParam(':province', $_POST['province']);

					$stmnt->execute();

					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					echo "<p style='color:green'>Data inserted into Postal Codes table</p>";
				}
				catch (PDOException $err ) {
					echo "<p style='color:red'>Data insertion into Postal Codes table failed: " . $err->getMessage() . "</p>\r\n";
				}

				try {

					$sql="INSERT INTO Customer_Has_Address (CustomerID, Unit, StreetNumber, PostalCode) VALUES (:customerID, :unit, :streetnumber, :postalcode);";
					$stmnt = $conn->prepare($sql);
					$stmnt->bindParam(':customerID', $_POST['customerID']);
					$stmnt->bindParam(':unit', $_POST['unit']); 
					$stmnt->bindParam(':streetnumber', $_POST['streetnumber']);
					$stmnt->bindParam(':postalcode', $_POST['postalcode']);

					$stmnt->execute();

					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					echo "<p style='color:green'>Data inserted into Addresses table</p>";
				}
				catch (PDOException $err ) {
					echo "<p style='color:red'>Data insertion into Adresses table failed: " . $err->getMessage() . "</p>\r\n";
				}

				unset($conn);

				echo "<a href='../insert.html'>Insert another customer</a>";

			?>
		</main>
		</div>
	    <footer>
	    	Copyright&copy; of all the images are from free source websites.
	    	<br>
	    	Disclaimer: this website belongs to a school project and is not for commercial use.
	    	<br>
	    	<a href="mailto:rvieiracosta00@mylangara.ca">rvieiracosta00@mylangara.ca</a>
	    </footer>
	</body>
</html>
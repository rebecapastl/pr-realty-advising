<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PR Realty Advising :: Create a Table</title>
    	<meta charset="utf-8">
    	<link rel="stylesheet" href="../prrealty.css">
    	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	</head>
	<body>
		<header>
	        <h2>Welcome to PR Realty Advising :: Create a Table</h2>
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
				$servername = "localhost";
				$dbname = "PRRealtyAdvising";
				$username = "root";
				$password = "";

				try {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					echo "<p style='color:green'>Connection successful</p>";
				} catch (PDOException $err) {
					echo "<p style='color:red'>Connection failed: " . $err->getMessage() . "</p>\r\n";
				}

				$sql = "CREATE TABLE Customer(
						CustomerID INT,
						FirstName VARCHAR(24) NOT NULL,
						LastName VARCHAR(48) NOT NULL,
						PhoneNumber VARCHAR(32) NOT NULL,
						Email VARCHAR(32),
						Occupation VARCHAR(32),
						PRIMARY KEY (CustomerID)
						);";

				try {
					$conn->exec($sql);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					echo "<p style='color:green'>Customers table created</p>";
				} catch (PDOException $err) {
					echo "<p style='color:red'>Connection failed: " . $err->getMessage() . "</p>\r\n";
				}

				$sql = "CREATE TABLE PostalCodes(
						PostalCode CHAR(6),
						StreetName VARCHAR(24) NOT NULL,
						Municipality VARCHAR(24) NOT NULL,
						Province CHAR(2) NOT NULL,
						PRIMARY KEY (PostalCode)
						);";

				try {
					$conn->exec($sql);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					echo "<p style='color:green'>Postal Codes table created</p>";
				} catch (PDOException $err) {
					echo "<p style='color:red'>Connection failed: " . $err->getMessage() . "</p>\r\n";
				}

				$sql = "CREATE TABLE Customer_Has_Address(
						CustomerID INT,
						Unit VARCHAR(8),
						StreetNumber INT,
						PostalCode CHAR(6),
						FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID) ON DELETE CASCADE,
						FOREIGN KEY (Unit,StreetNumber,PostalCode) REFERENCES Address(Unit,StreetNumber,PostalCode) ON DELETE CASCADE, 
						PRIMARY KEY (CustomerID)
						);";

				try {
					$conn->exec($sql);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					echo "<p style='color:green'>Addresses table created</p>";
				} catch (PDOException $err) {
					echo "<p style='color:red'>Connection failed: " . $err->getMessage() . "</p>\r\n";
				}

				unset($conn);
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
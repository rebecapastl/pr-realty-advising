<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PR Realty Advising :: Create a Database</title>
	    <meta charset="utf-8">
	    <link rel="stylesheet" href="../prrealty.css">
	    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
	</head>
	<body>
		<header>
	        <h2>Welcome to PR Realty Advising :: Create a Database</h2>
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
				$databasename = "prrealtyadvising";
				$username = "root";
				$password = "";

				try {
					$conn = new PDO("mysql:host=$servername", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					echo "<p style='color:green'>Connection successful</p>";
				} catch (PDOException $err) {
					echo "<p style='color:red'>Connection failed: " . $err->getMessage() . "</p>";
				}

				try {
					$sql = "CREATE DATABASE PRRealtyAdvising;"; //SQL Query

					$conn->exec($sql);
					echo "<p style='color:green'>Database created successfully</p>";
				} catch (PDOException $err) {
					echo $sql . "<p style='color:red'>" . $err->getMessage() . "</p>";
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
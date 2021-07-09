<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PR Realty Advising :: Queries</title>
    	<meta charset="utf-8">
    	<link rel="stylesheet" href="../prrealty.css">
    	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	</head>
	<body>
		<header>
	        <h2>Welcome to PR Realty Advising :: Display all customers' information</h2>
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
			        echo "<p style='color:red'> Connection failed: " . $err . getMessage() . "</p>\r\n";
			    }

			    try {
			        $sql = "SELECT  Customer.CustomerID, FirstName, LastName, PhoneNumber, Email, Occupation, Province FROM (Customer LEFT JOIN Customer_Has_Address ON Customer.CustomerID = Customer_Has_Address.CustomerID) LEFT JOIN PostalCodes ON Customer_Has_Address.PostalCode = PostalCodes.PostalCode WHERE PostalCodes.Province = '" . $_POST['province'] . "'";
			        $stmnt = $conn->prepare($sql);
			        $stmnt->execute();
			        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			        $row = $stmnt->fetch();
			        if ($row) {
			            echo '<table>';
			            echo '<tr> <th>CustomerID</th> <th>First Name</th> <th>Last Name</th> <th>Phone Number</th> <th>Email</th> <th>Occupation</th> <th>Province</th> </tr>';
			            do {
			                echo '<tr><td>' . $row['CustomerID'] . '</td><td>' . $row['FirstName'] . '</td><td>' . $row['LastName'] . '</td><td>' . $row['PhoneNumber'] . '</td><td>' . $row['Email'] . '</td><td>' . $row['Occupation'] . '</td><td>' . $row['Province'] .'</td></tr>';
			            } while ($row = $stmnt->fetch());
			            echo '</table>';
			        } else {
			            echo "<p> No customers found</p>";
			        }
			   	} catch (PDOException $err) {
        		echo "<p style='color:red'>Selection failed: " . $err->getMessage() . "</p>\r\n";
    			}
			    unset($conn);

			    echo "<a href='../select.html'>Back to the SELECT queries</a>";

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
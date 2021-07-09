<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PR Realty Advising :: Update</title>
    	<meta charset="utf-8">
    	<link rel="stylesheet" href="../prrealty.css">
    	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	</head>
	<body>
		<header>
	        <h2>Welcome to PR Realty Advising :: Update customer's info</h2>
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

		        $update = "";
		        $customer = $_POST['customerID'];
		        $firstname = $_POST['fname'];
		        $lastname = $_POST['lname'];
		        $phone = $_POST['phone'];
		        $email = $_POST['email'];
		        $occupation = $_POST['occupation'];
       			$unit = $_POST['unit'];
	        	$streetnumber = $_POST['streetnumber'];
	        	$streetname = $_POST['streetname'];
	        	$municipality = $_POST['municipality'];
	        	$province = $_POST['province'];
	        	$postalcode = $_POST['postalcode'];

				if (empty($customer)){
		        	echo "<p style='color:red'>You need to inform customerID</p>";
		        } else {
			        try {
			        	if (!empty($firstname)){
			        		$update .= "UPDATE " . $dbname . ".Customer SET FirstName = '" . $_POST['fname'] . "' WHERE CustomerID = '" . $_POST['customerID'] . "';\r\n";
			        	}
			        	if (!empty($lastname)){
		        			$update .= "UPDATE " . $dbname . ".Customer SET LastName = '" . $_POST['lname'] . "' WHERE CustomerID = '" . $_POST['customerID'] . "';\r\n";
		        		} 
        		      	if (!empty($phone)){
		        			$update .= "UPDATE " . $dbname . ".Customer SET PhoneNumber = '" . $_POST['phone'] . "' WHERE CustomerID = '" . $_POST['customerID'] . "';\r\n";
		        		}
		        		if (!empty($email)){
		        			$update .= "UPDATE " . $dbname . ".Customer SET Email = '" . $_POST['email'] . "' WHERE CustomerID = '" . $_POST['customerID'] . "';\r\n";
		        		}
		        		if (!empty($occupation)){
		        			$update .= "UPDATE " . $dbname . ".Customer SET Occupation = '" . $_POST['occupation'] . "' WHERE CustomerID = '" . $_POST['customerID'] . "';\r\n";
		        		}
		        		if (!empty($unit)){
			        		$update .= "UPDATE " . $dbname . ".Customer_Has_Address SET Unit = '" . $_POST['unit'] . "' WHERE CustomerID = '" . $_POST['customerID'] . "';\r\n";
			        	}
			        	if (!empty($streetnumber)){
		        			$update .= "UPDATE " . $dbname . ".Customer_Has_Address SET StreetNumber = '" . $_POST['streetnumber'] . "' WHERE CustomerID = '" . $_POST['customerID'] . "';\r\n";
		        		}
		        		if (!empty($postalcode)){
		        			$update .= "UPDATE " . $dbname . ".Customer_Has_Address, " . $dbname . ".PostalCodes SET PostalCodes.PostalCode = '" . $_POST['postalcode'] . "', Customer_Has_Address.PostalCode = '" . $_POST['postalcode'] . "' WHERE Customer_Has_Address.CustomerID = '" . $_POST['customerID'] . "' AND Customer_Has_Address.PostalCode = PostalCodes.PostalCode;\r\n";
		        		}
			        	if (!empty($streetname)){
		        			$update .= "UPDATE " . $dbname . ".PostalCodes, " . $dbname . ".Customer_Has_Address, " . $dbname . ".Customer SET PostalCodes.StreetName = '" . $_POST['streetname'] . "' WHERE Customer_Has_Address.CustomerID = '" . $_POST['customerID'] . "' AND Customer_Has_Address.PostalCode = PostalCodes.PostalCode;\r\n";
		        		}
		        		if (!empty($municipality)){
		        			$update .= "UPDATE " . $dbname . ".PostalCodes, " . $dbname . ".Customer_Has_Address, " . $dbname . ".Customer SET PostalCodes.Municipality = '" . $_POST['municipality'] . "' WHERE Customer_Has_Address.CustomerID = '" . $_POST['customerID'] . "' AND Customer_Has_Address.PostalCode = PostalCodes.PostalCode;\r\n";
		        		}	
		        		if (!empty($province)){
		        			$update .= "UPDATE " . $dbname . ".PostalCodes, " . $dbname . ".Customer_Has_Address, " . $dbname . ".Customer SET PostalCodes.Province = '" . $_POST['province'] . "' WHERE Customer_Has_Address.CustomerID = '" . $_POST['customerID'] . "' AND Customer_Has_Address.PostalCode = PostalCodes.PostalCode;\r\n";
		        		}		        				        		
			            $stmnt = $conn->prepare($update);
			            $stmnt->bindParam(':customerID', $_POST['customerID']);
			            $stmnt->bindParam(':fname', $_POST['fname']);
			            $stmnt->bindParam(':lname', $_POST['lname']);
			            $stmnt->bindParam(':phone', $_POST['phone']);
			            $stmnt->bindParam(':email', $_POST['email']);
			            $stmnt->bindParam(':ocuppation', $_POST['occupation']);
			            $stmnt->bindParam(':unit', $_POST['unit']);
			            $stmnt->bindParam(':streetnumber', $_POST['streetnumber']);
			            $stmnt->bindParam(':streetname', $_POST['streetname']);
			            $stmnt->bindParam(':municipality', $_POST['municipality']);
			            $stmnt->bindParam(':province', $_POST['province']);
			            $stmnt->bindParam(':postalcode', $_POST['postalcode']);

			            $stmnt->execute();
			            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			            echo "<p style='color:green'>Record updated</p>";
				    } catch (PDOException $err) {
			            echo "<p style='color:red'>Record update failed: " . $err->getMessage() . "</p>\r\n";
			        }
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
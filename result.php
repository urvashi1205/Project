<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Show MySQL DB Data</title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 3px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<body>


<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
 
<table class="table table-bordered">
 <thead>
 <tr>
 <th>First Name</th>
 <th>Last Name</th>
 <th>Age</th>
 <th>Profession</th>
 <th>Gender</th>
 </tr>
 </thead>
 <tbody>
 <tr>
 <?php
 //Define your host here.
$hostname = "localhost";

//Define your database username here.
$username = "root";

//Define your database password here.
$password = "";

//Define your database name here.
$dbname = "project";

 // Create connection
$connection_obj = mysqli_connect($hostname, $username, $password, $dbname);
// Check connection
if (!$connection_obj) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM employee";
$result = mysqli_query($connection_obj, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       echo"<td>".$row['FirstName']."</td>";
 		echo"<td>".$row['LastName']."</td>";
 		echo"<td>".$row['Age']."</td>";
 		echo"<td>".$row['Profession']."</td>";
 		echo"<td>".$row['Gender']."</td>"; ?>
 		
 		<?php echo "</tr>";
    }
}
$age = 23;
$Profession = 'Interior Designer';
 
// prepare the insert query
$query = "UPDATE employee SET Profession = '". mysqli_real_escape_string($connection_obj, $Profession) ."' WHERE Age = '". (int) $age ."'";
 
// run the insert query
mysqli_query($connection_obj, $query);
 
// initialize variables for the insert query
$FirstName = 'John';
$LastName = 'Smith';
$Age = 34;
$Profession = 'Teacher';
$Gender ='M';
 
// prepare the insert query
$query = "INSERT INTO employee(FirstName,LastName,Age,Profession,Gender)
VALUES ('". mysqli_real_escape_string($connection_obj, $FirstName) ."','". mysqli_real_escape_string($connection_obj, $LastName) ."','". mysqli_real_escape_string($connection_obj, $Age) ."','". mysqli_real_escape_string($connection_obj, $Profession) ."','". mysqli_real_escape_string($connection_obj, $Gender) ."')";


 
// run the insert query
mysqli_query($connection_obj, $query);


 $age = 34;
// prepare the insert query
$query = "DELETE FROM employee WHERE age = '". (int) $age ."'";
 
// run the delete query
mysqli_query($connection_obj, $query);
 mysqli_close($connection_obj);
 ?>
</table>

</div>
</body>
</html>
<!DOCTYPE html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Local Hospital</title>

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
  <!--Navigation bar-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Local<span>Hospital</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="addpatient.php">Add Patient</a></li>
          <li><a href="availabledoctors.php">Available Doctors</a></li>
          <li><a href="appointments.php">Appointments</a></li>
		  <li><a href="addappointment.php">Add Appointment</a></li>
        </ul>
      </div>
    </div>
  </nav>

<br>
<br>
<br>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT DoctorID, First, Last, SSN, Gender, DateOfBirth, Start_Date, Patient_ID, Dept_ID FROM doctor";
$result = $conn->query($sql);


if ($result->num_rows > 0 ) {
    echo "<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>SSN</th>
		<th>Gender</th>
		<th>Date of Birth</th>
		<th>Start Date</th>
		<th>PatientID</th>
		<th>Department ID</th>
	</tr>";
    // output data of each row
    while($row = $result->fetch_assoc() ) {
        echo "<tr><td>".$row["DoctorID"]."</td><td>". $row["First"] ," ". $row["Last"] ."</td><td>" . $row["SSN"] ."</td><td>" . $row["Gender"] ."</td><td>" . $row["DateOfBirth"] ."</td><td>". $row["Start_Date"] . "</td><td>" . $row["Patient_ID"] ."</td><td>" . $row["Dept_ID"] . 
         "</td><tr>";}
   echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
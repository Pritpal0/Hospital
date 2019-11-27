<?php

// Select Patients
// Get ID

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT PatientID, First, Last FROM patient";
$results = $conn->query($sql);

?>


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

<h1>Add New Appointment<h1>

<form action="insertappointment.php" method="POST">
  <table>
  
  
   <tr>
    <td>Patient ID :</td>

    <td>
      <select>
        <?php
            while ($rows = $results->fetch_assoc()) {
               $patientID = $rows['PatientID'];
               $fname = $rows['First'];
               $lname = $rows['Last'];
               echo "<option value='$patientID'>$fname $lname</option>";
            }
        ?>
      </select>
    </td>
    
  </tr>
   

   <tr>
    <td>Date of Appointment :</td>
    <td><input type="date" name="Date_Of_Birth" required></td>
   </tr>
   <tr>
   
   
    <td>Time :</td>
    <td><input type="number" name="SSN" required></td>
   </tr>   
   <tr>
   
   
    <td>Doctor's Name :</td>
    <td>
     <input type="radio" name="Gender" value="m" required>Male
     <input type="radio" name="Gender" value="f" required>Female
    </td>
   </tr>
   <tr>
   
    <td><input type="submit" value="submit"></td>
   </tr>
  </table>
 </form>
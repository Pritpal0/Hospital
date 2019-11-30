<?php

require 'dbcheck.inc.php';
$PatientID = $_POST['PatientID'];
$AppointmentID = rand(1, 99999);
$DoctorName = $_POST['DoctorName'];
$AppointmentTime = $_POST['AppointmentTime'];
$AppointmentDate = $_POST['AppointmentDate'];
$AppointmentTypeID = $_POST['AppointmentTypeID'];
// TODO: add appointment type

if (!empty($PatientID) || !empty($AppointmentID) || !empty($DoctorName) || !empty($AppointmentTime || !empty($AppointmentDate)) || !empty($AppointmentTypeID)){

     $INSERT = "INSERT Into Appointment 
     (AppointmentID, Type_ID, Doctor_name, Appointment_time, Appointment_date, Appt_Patient_ID) 
     values('$AppointmentID', '$AppointmentTypeID', '$DoctorName', '$AppointmentTime', '$AppointmentDate', '$PatientID')";
    
     
     if(mysqli_query($conn, $INSERT)){
         echo "Appointment added successfully.";
         header( "refresh:3;url=appointments.php" );
         exit();
     } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
     }
    
} else {
	echo "All field are required";
 die();
}

?>
<?php

$PatientID = $_POST['PatientID'];
$AppointmentID = rand(1, 99999);
$DoctorName = $_POST['DoctorName'];
$AppointmentTime = $_POST['AppointmentTime'];
$AppointmentDate = $_POST['AppointmentDate'];
$AppointmentTypeID = $_POST['AppointmentTypeID'];
// TODO: add appointment type

if (!empty($PatientID) || !empty($AppointmentID) || !empty($DoctorName) || !empty($AppointmentTime || !empty($AppointmentDate)) || !empty($AppointmentTypeID)){
		
    //create connection
    $link = mysqli_connect("localhost", "root", "root", "hospital");
    if (mysqli_connect_error()) {
        echo("ADSFASFSAFD");
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
	
    
     $INSERT = "INSERT Into Appointment 
     (AppointmentID, Type_ID, Doctor_name, Appointment_time, Appointment_date, Appt_Patient_ID) 
     values('$AppointmentID', '$AppointmentTypeID', '$DoctorName', '$AppointmentTime', '$AppointmentDate', '$PatientID')";
    
     
     if(mysqli_query($link, $INSERT)){
         header("Location: http://localhost:8888/hospital");
         exit();
     } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
     }
    }
} else {
	echo "All field are required";
 die();
}

?>
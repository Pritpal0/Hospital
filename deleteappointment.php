<?php
require 'dbcheck.inc.php';
$AppointmentID = $_POST['AppointmentID'];

if (!empty($AppointmentID))
{
        $DELETE = "DELETE FROM Appointment WHERE AppointmentID = $AppointmentID";
     
        if(mysqli_query($conn, $DELETE)){
        echo "Records deleted successfully.";
        //header("Location: http://localhost:8888/hospital");
        header( "refresh:3;url=index.php" );
         exit();
        } 
        else
        {
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
} 
else 
{
	echo "All field are required";
 die();
}

?>
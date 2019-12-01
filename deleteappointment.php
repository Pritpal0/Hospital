<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // The request is using the POST method
require 'dbcheck.inc.php';
$AppointmentID = $_POST['AppointmentID'];

if (!empty($AppointmentID))
{
        $DELETE = "DELETE FROM Appointment WHERE AppointmentID = $AppointmentID";
     
        if(mysqli_query($conn, $DELETE)){
        echo "Records deleted successfully.";
        //header("Location: http://localhost:8888/hospital");

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

}
else
{
    echo "sike, that's the wrong link";
}
?>
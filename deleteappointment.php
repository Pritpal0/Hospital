<?php

$AppointmentID = $_POST['AppointmentID'];

if (!empty($AppointmentID))
{
		
    //create connection
    $link = mysqli_connect("localhost", "root", "root", "hospital");
    if (mysqli_connect_error()) 
    {
        echo("ADSFASFSAFD");
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
    else 
    {
        $DELETE = "DELETE FROM Appointment WHERE AppointmentID = $AppointmentID";
     
        if(mysqli_query($link, $DELETE)){
         header("Location: http://localhost:8888/hospital");
         exit();
        } 
        else
        {
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
} 
else 
{
	echo "All field are required";
 die();
}

?>
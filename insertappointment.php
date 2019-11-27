<?php

@$PatientID = $_POST['PatientID'];
@$First = $_POST['First'];
@$Last = $_POST['Last'];
@$SSN = $_POST['SSN'];
@$Gender = $_POST['Gender'];
@$Phone = $_POST['Phone'];
@$Street = $_POST['Street'];
@$City = $_POST['City'];
@$State = $_POST['State'];
@$ZipCode = $_POST['ZipCode'];
@$Date_Of_Birth = $_POST['Date_Of_Birth'];
@$Dept_ID = $_POST['Dept_ID'];

if (!empty($PatientID) || !empty($First) || !empty($Last) || !empty($SSN) || !empty($Gender) || !empty($Phone)|| !empty($Street)|| !empty($City)|| !empty($State)|| !empty($ZipCode)
	|| !empty($Date_Of_Birth)|| !empty($Dept_ID)){
		
    //create connection
    $link = mysqli_connect("localhost", "root", "", "hospital");
    if (mysqli_connect_error()) {
        echo("ADSFASFSAFD");
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
	
    
     $INSERT = "INSERT Into patient 
     (PatientID, First, Last, SSN, Gender, Phone, Street, City, State, ZipCode, Date_Of_Birth, Dept_ID ) 
     values('$PatientID', '$First', '$Last', '$SSN', '$Gender', '$Phone', '$Street', '$City', '$State', '$ZipCode', '$Date_Of_Birth', '$Dept_ID')";
    
     
     if(mysqli_query($link, $INSERT)){
         echo "Records added successfully.";
     } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
     }
    }
} else {
	echo "All field are required";
 die();
}

?>
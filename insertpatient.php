<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method

require 'dbcheck.inc.php';

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

     $INSERT = "INSERT Into patient 
     (PatientID, First, Last, SSN, Gender, Phone, Street, City, State, ZipCode, Date_Of_Birth, Dept_ID ) 
     values('$PatientID', '$First', '$Last', '$SSN', '$Gender', '$Phone', '$Street', '$City', '$State', '$ZipCode', '$Date_Of_Birth', '$Dept_ID')";
    
     
     if(mysqli_query($conn, $INSERT)){
         echo "Records added successfully.";
         //header("Location: http://localhost:8888/hospital");
         header( "refresh:3;url=index.php" );
         exit();
         

     } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
     }
    
} else {
	echo "All field are required";
 die();
}

}

else
{
    echo "sike, that's the wrong link";
}
?>
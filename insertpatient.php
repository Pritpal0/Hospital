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
    
    if (!preg_match("/^[0-9]*$/", $PatientID) 
        || !preg_match("/^[a-zA-Z -]*$/", $First) 
        || !preg_match("/^[a-zA-Z -]*$/", $Last) 
        || !preg_match("/^[0-9]*$/", $SSN) ||  strlen($SSN) != 10
        || !preg_match("/^[0-9]*$/", $Phone) ||  strlen($Phone) != 10
        || !preg_match("/^[a-zA-Z@.0-9]*$/", $patient_email)
        || !preg_match("/^[a-zA-Z0-9. ]*$/", $Street) 
        || !preg_match("/^[a-zA-Z ]*$/", $City) 
        || !preg_match("/^[a-zA-Z ]*$/", $State)
        || !preg_match("/^[0-9]*$/", $ZipCode))
    {
        echo "ASDFASDF";
        header("Location: /hospital /addpatient.php?appointment=invalid");
        exit();
    }
    else{
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
    }
    
} 
else {
	echo "All field are required";
 die();
}

}

else
{
    $dir_path = "img/";
    $extensions_array = array('jpg','png','jpeg');
    
    if(is_dir($dir_path))
    {
        $files = scandir($dir_path);
        
        for($i = 0; $i < count($files); $i++)
        {
            if($files[$i] !='.' && $files[$i] !='..')
            {
                // get file name
                echo "Uh Oh. Looks like you're not suppose to be here, don't worry lets get you back to the home page
                <br>";
                
                // get file extension
                $file = pathinfo($files[$i]);
                $extension = $file['extension'];
                //echo "File Extension-> $extension<br>";
                
               // check file extension
                if(in_array($extension, $extensions_array))
                {
                // show image
                //echo "<img src='$dir_path$files[$i]' style='width:150px;height:225px;'><br>";
                echo "<a href='index.php'><img src='$dir_path$files[$i]' style='width:150px;height:225px;'><br>";
                }
            }
        }
    }
}
?>
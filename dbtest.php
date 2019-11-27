<?php


@$PatientID = rand(0, 999999);
@$First = 'Angad';
@$Last = 'Singh';
@$SSN = 1231232;
@$Gender = 'M';
@$Phone = 1236536346;
@$Street = 'gfgejsgd';
@$City = 'hdfajdfa';
@$State = 'fdsjafkldjlk';
@$ZipCode = 12312312;
@$Date_Of_Birth = '05/05/2005';
@$Dept_ID = 1;



$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "hospital";
//create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if (mysqli_connect_error()) 
{
 die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} 
else 
{
	
 $SELECT = "SELECT PatientID From patient Where PatientID = ? Limit 1";
 $INSERT = "INSERT Into patient (PatientID, First, Last, SSN, Gender, Phone, Street, City, State, ZipCode, Date_Of_Birth, Dept_ID ) values('$PatientID'?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
 //Prepare statement
 $stmt = $conn->prepare($SELECT);
 $stmt->bind_param("i", $PatientID);
 $stmt->execute();
 $stmt->bind_result($PatientID);
 $stmt->store_result();
 $rnum = $stmt->num_rows;
 if ($rnum==0) 
 {
  $stmt->close();
  $stmt = $conn->prepare($INSERT);
  $stmt->bind_param("issisisssisi", $PatientID, $First, $Last, $SSN, $Gender, $Phone, $Street, $City, $State, $ZipCode, $Date_Of_Birth, $Dept_ID);
  $stmt->execute();
  echo "New record inserted sucessfully";
 } 
 else 
 {
  echo "There is already a user with this ID";
 }
 $stmt->close();
 $conn->close();
}
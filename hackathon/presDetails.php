<?php
session_start();
error_reporting(0);
$link=mysqli_connect("localhost","root","","e-prescription");
if($link->connect_error){
    die("Connection Error".$link->connect_error);
}
    $doctorname=mysqli_real_escape_string($link,$_POST["doctorName"]);
$doctorQual=mysqli_real_escape_string($link,$_POST["doctorQual"]);
$hospName=mysqli_real_escape_string($link,$_POST["hospName"]);
$hospAddress=mysqli_real_escape_string($link,$_POST["hospAddress"]);
$email=mysqli_real_escape_string($link,$_POST["email"]);
$number=mysqli_real_escape_string($link,$_POST["number"]);

$patientname=mysqli_real_escape_string($link,$_POST["patientName"]);
$patientage=mysqli_real_escape_string($link,$_POST["patientAge"]);
$patientWeight=mysqli_real_escape_string($link,$_POST["patientWeight"]);

$medicineName=mysqli_real_escape_string($link,$_POST["medicineName"]);
$medStrength=mysqli_real_escape_string($link,$_POST["medStrength"]);
$medPills=mysqli_real_escape_string($link,$_POST["medPills"]);
$medDuration=mysqli_real_escape_string($link,$_POST["medDuration"]);
$notes=mysqli_real_escape_string($link,$_POST["notes"]);
$docSign=$_FILES["doctor_sign"]["tmp_name"];

$imgData=base64_encode(file_get_contents(addslashes($docSign)));

$sql="INSERT INTO prescription (DoctorName,Qualification,HospitalName,Address,Email,Number,PatientName,Age,Weight,MedicineName,Strength,Dosage,Duration,DoctorSign,AdditionalNotes)
 VALUES('$doctorname','$doctorQual','$hospName','$hospAddress','$email','$number','$patientname','$patientage','$patientWeight','$medicineName','$medStrength','$medPills','$medDuration','$imgData','$notes')";
 if(mysqli_query($link,$sql)){
     echo "<script>alert('Records added successfully');window.location.href='prescription update.php'</script>";
     $_SESSION["doctor_name"]=$doctorname;
 }
 else{
     echo 'Enter the data again';
 }

?>

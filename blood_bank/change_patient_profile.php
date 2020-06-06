<?php

session_start();
include 'connection.php';

$patient_id = $_SESSION['patient_id'];

 $sql ="SELECT * FROM patient WHERE patient_id = '$patient_id'";

 $result =  mysqli_query($conn, $sql) or die( mysqli_error($conn));

  $row = mysqli_fetch_array($result);


  // echo $row["name"];
  // echo $row['blood_gp'];
  // echo $row['area'];
  // echo $row["age"];
  // echo $row["last_donated"];
  // echo $row["email"];
  // echo $row["password"];



  $sql2 ="SELECT * FROM patient_phone_no WHERE patient_id = '$patient_id'";

 $result2 =  mysqli_query($conn, $sql2) or die( mysqli_error($conn));

  $row2 = mysqli_fetch_array($result2);

   


   if($_SERVER['REQUEST_METHOD'] == 'POST'){
   	$name = $_POST["name"];
   $age = $_POST["age"];
    $bg = $_POST["bg"];
  
  $phone = $_POST["phone"];
  $area = $_POST["area"];
  $email = $_POST["email"];


   	  $sql3 = "UPDATE patient SET name= '$name',blood_gp = '$bg',address= '$area',age='$age',email='$email' WHERE patient_id='$patient_id' ";
      $sql4 = "UPDATE patient_phone_no SET phone_no = '$phone' WHERE patient_id='$patient_id'";
         mysqli_query($conn,$sql3);
         mysqli_query($conn,$sql4);
   	  mysqli_close($conn);
   	  header('Location: after_patient.php');


   }


?>




<!DOCTYPE html>
<html>
<head>
	<title>Change Patient Profile</title>
</head>
<body>


	<h1>  Update Patient's profile </h1>


	<form action="change_patient_profile.php" method="post">
Name : <input type="text" name="name" required value="<?php echo $row['name'] ?>"> <br>
Age : <input type="number" name="age" required value="<?php echo $row['age'] ?>">  <br>
Blood group : <input type="text" name="bg" required value="<?php echo $row['blood_gp'] ?>"><br>

Phone Number : <input type="number" name="phone" required value="<?php echo $row2['phone_no'] ?>"> <br>
Area : <input type="text" name="area" required value="<?php echo $row['address'] ?>"><br>
Email: <input type="Email" name="email" required value="<?php echo $row['email'] ?>"> <br>
<!-- Password : <input type="Password" name="pass" required><br>
Confirm Password : <input type="Password" name="confpass" required><br> -->

<input type="submit" value="Update">






</form>

</body>
</html>



<?php

session_start();
include 'connection.php';

$donor_id = $_SESSION['donor_id'];

 $sql ="SELECT * FROM donor WHERE donor_id = '$donor_id'";

 $result =  mysqli_query($conn, $sql) or die( mysqli_error($conn));

  $row = mysqli_fetch_array($result);


  // echo $row["name"];
  // echo $row['blood_gp'];
  // echo $row['area'];
  // echo $row["age"];
  // echo $row["last_donated"];
  // echo $row["email"];
  // echo $row["password"];



  $sql2 ="SELECT * FROM donor_phone_no WHERE donor_id = '$donor_id'";

 $result2 =  mysqli_query($conn, $sql2) or die( mysqli_error($conn));

  $row2 = mysqli_fetch_array($result2);

  // echo $row2["phone_no"]


   if($_SERVER['REQUEST_METHOD'] == 'POST'){
   	$name = $_POST["name"];
  $age = $_POST["age"];
  $bg = $_POST["bg"];
  $lastdonate = $_POST["lastdonate"];
  $phone = $_POST["phone"];
  $area = $_POST["area"];
  $email = $_POST["email"];


   	  $sql3 = "UPDATE donor SET name= '$name',blood_gp = '$bg',area= '$area',age='$age',last_donated='$lastdonate',email='$email' WHERE donor_id='$donor_id' ";
        $sql4 = "UPDATE donor_phone_no SET phone_no = '$phone' WHERE donor_id='$donor_id'";
        mysqli_query($conn,$sql3);
        mysqli_query($conn,$sql4);
   	  mysqli_close($conn);
   	  header('Location: after_donor.php');


   }


?>




<!DOCTYPE html>
<html>
<head>
	<title>Change Donor Profile</title>
</head>
<body>


	<h1>  Update Donor's profile </h1>


	<form action="change_donor_profile.php" method="post">
Name : <input type="text" name="name" required value="<?php echo $row['name'] ?>"> <br>
Age : <input type="number" name="age" required value="<?php echo $row['age'] ?>">  <br>
Blood group : <input type="text" name="bg" required value="<?php echo $row['blood_gp'] ?>"><br>
Last Donated : <input type="date" name="lastdonate" required value="<?php echo $row['last_donated'] ?>"> <br>
Phone Number : <input type="number" name="phone" required value="<?php echo $row2['phone_no'] ?>"> <br>
Area : <input type="text" name="area" required value="<?php echo $row['area'] ?>"><br>
Email: <input type="Email" name="email" required value="<?php echo $row['email'] ?>"> <br>
<!-- Password : <input type="Password" name="pass" required><br>
Confirm Password : <input type="Password" name="confpass" required><br> -->

<input type="submit" value="Update">






</form>

</body>
</html>



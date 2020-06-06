<?php
 

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
 include "connection.php";
  
  $name = $_POST["name"];
  $age = $_POST["age"];
  $bg = $_POST["bg"];

  $phone = $_POST["phone"];
  $addr = $_POST["area"];
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  $confpass = $_POST["confpass"];

  if($pass != $confpass)
   {
    echo '<script language="javascript">';
echo 'alert("password do not match")';
echo '</script>';
   }

  // echo $name;
  // echo $age;
  // echo $bg;
  // echo $lastdonate;
  // echo $phone;
  // echo $area;
  // echo $pass;
  // echo $email;
  // echo $confpass;
  else {

  $sql = " INSERT INTO patient(name,blood_gp,age,address,email,password)VALUES('$name','$bg','$age','$addr','$email','$pass') ";
 
 
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header('Location: patient_login.php ');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


include "connection.php";

mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

  $sql2 = "SELECT patient_id FROM patient";
   $result = mysqli_query($conn,$sql2);

   if(mysqli_num_rows($result) != 0)
      {
        $max = -1;
        while($row = mysqli_fetch_array($result)){
          $pid = $row['patient_id'];
          if($pid>$max)
            $max = $pid;

        }
      }

      $patient_id = $max  ;

      echo $patient_id;
  
    


  $sql3 = "INSERT INTO patient_phone_no(phone_no,patient_id) VALUES('$phone','$patient_id') " ;

  if (mysqli_query($conn, $sql3)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
}


?>




<html>
<head>
</head>


<body>
<form action="patient_reg.php" method="post">
Name : <input type="text" name="name" required> <br>
Age : <input type="number" name="age" required>  <br>
Blood group : <input type="text" name="bg" required><br>

Phone Number : <input type="number" name="phone" required> <br>
Address : <input type="text" name="area" required><br>
Email: <input type="Email" name="email" required> <br>
Password : <input type="Password" name="pass" required><br>
Confirm Password : <input type="Password" name="confpass" required><br>

<input type="submit" value="Done">






</form>

</body>

</html>

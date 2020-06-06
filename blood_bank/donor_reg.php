<?php
 

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
 include "connection.php";
  
  $name = $_POST["name"];
  $age = $_POST["age"];
  $bg = $_POST["bg"];
  $lastdonate = $_POST["lastdonate"];
  $phone = $_POST["phone"];
  $area = $_POST["area"];
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
  

  $sql = " INSERT INTO donor(name,blood_gp,area,age,last_donated,email,password)VALUES('$name','$bg','$area','$age','$lastdonate','$email','$pass') ";
 
 
  if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header('Location: donor_login.php');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);



 include "connection.php";

mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

  $sql2 = "SELECT donor_id FROM donor";
   $result = mysqli_query($conn,$sql2);

   if(mysqli_num_rows($result) != 0)
      {
        $max = -1;
        while($row = mysqli_fetch_array($result)){
          $did = $row['donor_id'];
          if($did>$max)
            $max = $did;

        }
      }

      $donor_id = $max  ;

      echo $donor_id;
  
    


  $sql3 = "INSERT INTO donor_phone_no(phone_no,donor_id) VALUES('$phone','$donor_id') " ;

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
<h1>Donor Registration</h1>
<form action="donor_reg.php" method="post">
Name : <input type="text" name="name" required> <br>
Age : <input type="number" name="age" required>  <br>
Blood group : <input type="text" name="bg" required><br>
Last Donated : <input type="date" name="lastdonate" required> <br>
Phone Number : <input type="number" name="phone" required> <br>
Area : <input type="text" name="area" required><br>
Email: <input type="Email" name="email" required> <br>
Password : <input type="Password" name="pass" required><br>
Confirm Password : <input type="Password" name="confpass" required><br>

<input type="submit" value="Done">






</form>

</body>

</html>

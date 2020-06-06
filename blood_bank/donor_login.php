<?php

session_start();
 // echo $_POST["email"];
 // echo $_POST["pass"];
if($_SERVER['REQUEST_METHOD'] == 'POST'){

   $email = $_POST["email"];
   $pass = $_POST["pass"];
   
   include 'connection.php';

   $sql = " SELECT * FROM donor WHERE email='$email' AND password = '$pass' ";



    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) != 0){
    	echo "Login Successful";

      $_SESSION['test'] = 'OK';
      $_SESSION['donor'] ='OK';
    	
    	 $row = mysqli_fetch_row($result);
    	 // echo $row[2];
    	 $_SESSION['donor_id'] =  $row[2];
    }
    else
    	echo "No account found";

    header('Location: after_donor.php');

}

?>






<!DOCTYPE html>
<html>
<head>
	<title>Donor login</title>
</head>
<body>
  <h1> Donor Login  </h1>
 <form action="donor_login.php" method="post">

Email : <input type="Email" name="email" required> <br>
Password : <input type="Password" name="pass" required> <br>

<input type="submit" value="Log in">

 	
 </form>

</body>
</html>
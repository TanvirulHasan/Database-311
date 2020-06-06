<?php
session_start();

  
   

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>

  <style type="text/css">
    /* Add a black background color to the top navigation */
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #4CAF50;
  color: white;
}


.btn{
    align-items: : center;
    height : 50px;
    background-color : green;
}

.btn:hover{

   
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);

}

  </style>
</head>
<body>

	<div class="topnav">
  <a href="home.php">Home</a>
  
  
  <a href="find_donor.php">Find Donor</a>
  <a href="show_post.php">See post</a>
  <a href="blood_bank.php">Blood Bank </a>
  <a href="#" class="active">Dashboard</a>
  <a href="logout.php">Logout</a>

  <!-- <a href="#contact">Patient Dashboard</a>
  <a href="#about">Donor Dashboard</a> -->

</div>
    
  <button class="btn">  <a href="find_donor.php"> Find Donor</a></button> <br>
   <button class="btn">  <a href="change_patient_profile.php"> Change Profile info </a></button><br>
    <button class="btn">  <a href="post.php">Give post for blood </a></button> <br>
    <button class="btn"> <a href="patient_profile_delete.php"> Delete Profile </a></button><br>

</body>
</html>
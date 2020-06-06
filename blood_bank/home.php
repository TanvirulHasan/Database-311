<html>
<head>
</head>
<style>

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


</style>


<body>
<div class="topnav">
  <a class="active" href="home.php">Home</a>
  <?php
  session_start();
  if($_SESSION['test'] == 'not ok'){
    
   echo '<a href="reg.php">Registration</a>';
  
    echo '<a href="log.php">Login</a>';
     
  }

  ?>
  
  
  <a href="find_donor.php">Find Donor</a>
  <a href="show_post.php">See post</a>
  <a href="blood_bank.php">Blood Bank </a>
   <a href="logout.php">Logout</a>
  <!-- <a href="#contact">Patient Dashboard</a>
  <a href="#about">Donor Dashboard</a> -->

</div>



</body>




</html>
<?php


  session_start();

?>

<html>
<head>


</head>


<body>

<script type="text/javascript">

if (confirm("Do you want to delete your profile?") == true) {
		window.location.href = "delete_donor_conf.php";
	}

		else{
			window.location.href = "after_donor.php";
		}


</script>


</body>


</html>

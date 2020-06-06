<?php

session_start();


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script type="text/javascript">
	if (confirm("Do you want to delete your profile?") == true) {
		window.location.href = "delete_patient.php";
   
} 

</script>
</body>
</html>
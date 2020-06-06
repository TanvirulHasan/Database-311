<?php

  session_start();
  $_SESSION['test'] = 'not ok';
  $_SESSION['donor'] = 'not ok';
   $_SESSION['patient'] = 'not ok';

  header('Location: home.php');

?>
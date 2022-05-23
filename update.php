<?php
  include_once 'database.php';
  session_start();
  $email=$_SESSION['email'];
  $id = $_SESSION['id'];



  if(isset($_SESSION['key']))
  {
    if(@$_GET['q']== 'addData') 
    {
      $hr = $_POST['hr'];
      $rr = $_POST['rr'];
      $spo2=$_POST['spo2'];
      $fio2=$_POST['fio2'];
      $peep=$_POST['peep'];
      $pao2=$_POST['pao2'];
      
      $q3=mysqli_query($con,"INSERT INTO user_data VALUES  ('$id','$hr','$rr','$spo2','$fio2','$peep','$pao2', NOW())");
      header("location:dashboard.php?q=0");
    }
  }

  
  


?>
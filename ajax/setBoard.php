<?php
session_start();

//Sets the board session variable
if(isset($_POST['board'])){
  $_SESSION['board'] = $_POST['board'];
}else{
  $_SESSION['board'] = 'All';
}
 ?>

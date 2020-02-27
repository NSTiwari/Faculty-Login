<?php
$con=mysqli_connect("localhost","root","","faculty");

if (!$con){
    die("Connection failed: ".mysqli_connect_error());
}
?>
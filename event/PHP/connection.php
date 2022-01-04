<?php

$db = mysqli_connect("localhost","root","","event");

if(!$db){
    die("Error" . mysqli_connect_error());
    }
?>
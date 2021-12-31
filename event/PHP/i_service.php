<?php 
$db = mysqli_connect("localhost","root","","event");

if(!$db){
    die("Error" . mysqli_connect_error());
}
else{
    echo "Connection Done <br><br>";
}

$food = $_POST['food'];
$photo = $_POST['photo'];
$facility = $_POST['facility'];
$decoration = $_POST['decoration'];

$sfood = implode(", ",$food);
$sphoto = implode(", ",$photo);
$sfacility = implode(", ",$facility);
$sdecoration = implode(", ",$decoration);


$di = "insert into service(catering,photography_and_cinemetography,facility,decoration) 
values('$sfood','$sphoto','$sfacility','$sdecoration')";

if(mysqli_query($db, $di)){
    echo ("<script>
    window.alert('Information Added');
    window.location.href='event_book_record.php';
    </script>");
}
else{
    echo "Error" . mysqli_error($db) ;
}

?>
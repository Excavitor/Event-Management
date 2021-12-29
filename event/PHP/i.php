<?php 
$db = mysqli_connect("localhost","root","","practice");

if(!$db){
    die("Error" . mysqli_connect_error());
}
else{
    echo "Connection Done <br><br>";
}

$sname = $_POST['name'];
$sid = $_POST["id"];
// $suniversity = $_POST["university"];
// $scourse = $_POST["course"];

$di = "insert into saad_new(name,id) 
values('$sname',$sid)";


if(mysqli_query($db, $di)){
    // echo "Information Added";
    //echo '<script>alert("Information Added")</script>';
    // header("Location: event_book_record.php");
    echo ("<script>
    window.alert('Information Added');
    window.location.href='event_book_record.php';
    </script>");
}
else{
    echo "Error" . mysqli_error($db) ;
}

?>
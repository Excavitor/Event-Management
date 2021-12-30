<?php 
$db = mysqli_connect("localhost","root","","event");

if(!$db){
    die("Error" . mysqli_connect_error());
}
else{
    echo "Connection Done <br><br>";
}

$cname = $_POST['cname'];
$cemail = $_POST["cemail"];
$cnumber = $_POST['cnumber'];
$cstreet = $_POST["cstreet"];
$ccity = $_POST['ccity'];
$czip = $_POST["czip"];
$curl = $_POST['curl'];
$cdatef = $_POST["cdatef"];
$cdatet = $_POST['cdatet'];

$di = "insert into concert(organization_name,organization_email,organization_phone,street,city,zip,social_media_link,date_from,date_to) 
values('$cname','$cemail',$cnumber,'$cstreet','$ccity','$czip','$curl','$cdatef','$cdatet')";


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
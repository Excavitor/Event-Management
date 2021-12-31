<?php

$db = mysqli_connect("localhost","root","","event");

if(!$db){
    die("Error" . mysqli_connect_error());
}
else{
    echo "Connection Done <br><br>";
}

$name = $_POST['name'];
$phone = $_POST['phone'];

foreach($name as $index => $names)
    {
        $s_name = $names;
        $s_phone = $phone[$index];

        $di = "insert into people(name,phone_number) values('$s_name','$s_phone')";
        $di_run = mysqli_query($db, $di);
    }
//window.alert('Information Added');
if($di_run){
    echo ("<script>
    
    window.location.href='../service.html';
    </script>");
}
else{
    echo "Error" . mysqli_error($db) ;
}

?>
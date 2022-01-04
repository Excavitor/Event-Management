<?php 
session_start();
include 'connection.php';
echo "Welcome ". $_SESSION["username"]."<br>";

$username = $_SESSION["username"];
// echo $username;
$query = mysqli_query($db, "select * from users where user_name = '$username'");
$row = mysqli_fetch_array($query);
// print_r($row);
$id = $row['user_id'];


if (isset($_POST['csubmit'])) {
$cname = $_POST['cname'];
$cemail = $_POST["cemail"];
// $_SESSION['cemail'] = $cemail;
$cnumber = $_POST['cnumber'];
$cstreet = $_POST["cstreet"];
$ccity = $_POST['ccity'];
$czip = $_POST["czip"];
$curl = $_POST['curl'];
$cdatef = $_POST["cdatef"];
$cdatet = $_POST['cdatet'];

$di = "insert into concert(organization_name,organization_email,organization_phone,street,city,zip,social_media_link,date_from,date_to,user_id,event_name,event_type) 
values('$cname','$cemail',$cnumber,'$cstreet','$ccity','$czip','$curl','$cdatef','$cdatet','$id','Public','Concert')";

$_SESSION['cdatef'] = $cdatef;

if(mysqli_query($db, $di)){
    echo ("<script>
    
    window.location.href='i_people.php';
    </script>");
}
else{
    echo "Error" . mysqli_error($db) ;
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Concert Form</title>
</head>

<body>
    <form class="container bg-light my-5" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <h1 class="mb-5 text-center text-success fw-bold pt-3">Public Concert Form</h1>
        <hr class="w-100 d-md-none" />
        <hr class="w-100 d-md-none" />

        <div class="row m-3">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="cname" placeholder="Organization Name*" required />
            </div>
            <div class="form-group col-md-6">
                <input type="email" class="form-control" name="cemail" placeholder="Organization Email*" required />
            </div>
        </div>

        <div class="row m-3">
            <div class="form-group col-md-6">
                <input type="number" class="form-control" name="cnumber" placeholder="Organization Phone Number*"
                    required />
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="cstreet" placeholder="Street Address*" required />
            </div>
        </div>

        <div class="row m-3">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="ccity" placeholder="City*" required />
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="czip" placeholder="Zip Code*" required />
            </div>
        </div>

        <div class="m-4">
            <div class="mx-1 form-group">
                <input type="url" class="form-control" name="curl" placeholder="Social Media Link (optional)" />
            </div>
        </div>

        <div class="row m-3">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="cdatef" placeholder="Select Date (From)*"
                    onfocus="(this.type='date')">
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="cdatet" placeholder="Select Date (To)*"
                    onfocus="(this.type='date')">
            </div>
        </div>

        <button type="submit" name="csubmit" class="m-3 px-4 mx-4 btn btn-outline-success">Next</button>
    </form>
</body>

</html>
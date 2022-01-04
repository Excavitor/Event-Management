<?php
session_start();
include '../connection.php';
echo "Welcome ". $_SESSION["username"]."<br>";

$update = $_GET['update'];

?>

<?php

if (isset($_POST['cusubmit'])) {
    $cuname = $_POST['cuname'];
    $cuemail = $_POST["cuemail"];
    // $_SESSION['cemail'] = $cemail;
    $cunumber = $_POST['cunumber'];
    $custreet = $_POST["custreet"];
    $cucity = $_POST['cucity'];
    $cuzip = $_POST["cuzip"];
    $cuurl = $_POST['cuurl'];
    $cudatef = $_POST["cudatef"];
    $cudatet = $_POST['cudatet'];
    
    $di = "update concert set organization_name = '{$cuname}',organization_email = '{$cuemail}',organization_phone = '{$cunumber}',street = '{$custreet}',
    city = '{$cucity}',zip = '{$cuzip}',social_media_link = '{$cuurl}',date_from = '{$cudatef}',date_to = '{$cudatet}'
    where cid = {$update}
    ";
    
    // $_SESSION['cdatef'] = $cdatef;
    
    if(mysqli_query($db, $di)){
        echo ("<script>
    window.alert('Information Updated');
    window.location.href='concert_account.php';
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

    <?php
    // $update = $_GET['update'];
    $di = "select organization_name,organization_email,organization_phone,street,city,zip,social_media_link,date_from,date_to 
    from concert where cid = {$update}";
    $result = mysqli_query($db, $di);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){

    ?>

    <form class="container bg-light my-5" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <h1 class="mb-5 text-center text-success fw-bold pt-3">Public Concert Form</h1>
        <hr class="w-100 d-md-none" />
        <hr class="w-100 d-md-none" />

        <div class="row m-3">
            <div class="form-group col-md-6">
                <label>organization_name</label>
                <input type="text" class="form-control" name="cuname" value="<?php echo $row['organization_name'] ?>" />
            </div>
            <div class="form-group col-md-6">
                <label>organization_email</label>
                <input type="email" class="form-control" name="cuemail" value="<?php echo $row['organization_email'] ?>" />
            </div>
        </div>

        <div class="row m-3">
            <div class="form-group col-md-6">
            <label>organization_phone</label>
                <input type="number" class="form-control" name="cunumber" value="<?php echo $row['organization_phone'] ?>"/>
            </div>
            <div class="form-group col-md-6">
            <label>street</label>
                <input type="text" class="form-control" name="custreet" value="<?php echo $row['street'] ?>"/>
            </div>
        </div>

        <div class="row m-3">
            <div class="form-group col-md-6">
            <label>city</label>
                <input type="text" class="form-control" name="cucity" value="<?php echo $row['city'] ?>"/>
            </div>
            <div class="form-group col-md-6">
            <label>zip</label>
                <input type="text" class="form-control" name="cuzip"  value="<?php echo $row['zip'] ?>"/>
            </div>
        </div>

        <div class="m-4">
            <div class="mx-1 form-group">
            <label>social_media_link</label>
                <input type="url" class="form-control" name="cuurl"  value="<?php echo $row['social_media_link'] ?>"/>
            </div>
        </div>

        <div class="row m-3">
            <div class="form-group col-md-6">
            <label>date_from</label>
                <input type="text" class="form-control" name="cudatef" value="<?php echo $row['date_from'] ?>"
                    onfocus="(this.type='date')">
            </div>
            <div class="form-group col-md-6">
            <label>date_to</label>
                <input type="text" class="form-control" name="cudatet" value="<?php echo $row['date_to'] ?>"
                    onfocus="(this.type='date')">
            </div>
        </div>

        <button type="submit" name="cusubmit" class="m-3 px-4 mx-4 btn btn-outline-success">Next</button>
    </form>
    <?php
        }
    }
    ?>
</body>

</html>
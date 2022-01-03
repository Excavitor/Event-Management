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

$cdatef = $_SESSION['cdatef'];
// echo $username;
$query = mysqli_query($db, "select * from concert where date_from = '$cdatef'");
$row = mysqli_fetch_array($query);
// print_r($row);
$cid = $row['cid'];


if (isset($_POST['ssubmit'])) {

$food = $_POST['food'];
$photo = $_POST['photo'];
$facility = $_POST['facility'];
$decoration = $_POST['decoration'];

$sfood = implode(", ",$food);
$sphoto = implode(", ",$photo);
$sfacility = implode(", ",$facility);
$sdecoration = implode(", ",$decoration);


$di = "insert into service(catering,photography_and_cinemetography,facility,decoration,user_id,cid) 
values('$sfood','$sphoto','$sfacility','$sdecoration','$id','$cid')";

if(mysqli_query($db, $di)){
    echo ("<script>
    window.alert('Information Added');
    window.location.href='event_book_record.php';
    </script>");
}
else{
    echo "Error" . mysqli_error($db) ;
}
}

// $_SESSION['cid'] = $cid;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Services</title>
</head>

<body>
    <div class="container bg-light my-4">
        <h1 class="mb-5 pt-4 text-center">Services</h1>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="row">
                <div class="col mx-4">
                    <h3>Catering</h3>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Chinese" name="food[]" id="food">
                        <label class="form-check-label" for="food">
                            Chinese Food
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Thai" name="food[]" id="food">
                        <label class="form-check-label" for="food">
                            Thai Food
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Indian" name="food[]" id="food">
                        <label class="form-check-label" for="food">
                            Indian Food
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Mexican" name="food[]" id="food">
                        <label class="form-check-label" for="food">
                            Mexican Food
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Continental" name="food[]" id="food">
                        <label class="form-check-label" for="food">
                            Continental Food
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Deshi" name="food[]" id="food">
                        <label class="form-check-label" for="food">
                            Deshi Food
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Mughal" name="food[]" id="food">
                        <label class="form-check-label" for="food">
                            Mughal Food
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Drinks" name="food[]" id="food" checked>
                        <label class="form-check-label" for="food">
                            Drinks
                        </label>
                    </div>
                </div>


                <div class="col mx-4">
                    <h3>Photography and<br>Cinematography</h3>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Photographer" name="photo[]" id="photo" checked>
                        <label class="form-check-label" for="photo">
                            Photographer
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Photo Edit" name="photo[]" id="photo">
                        <label class="form-check-label" for="photo">
                            Photo Edit
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Print Photo" name="photo[]" id="photo">
                        <label class="form-check-label" for="photo">
                            Print Photo
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Cinemetographer" name="photo[]"
                            id="photo">
                        <label class="form-check-label" for="photo">
                            Cinemetographer
                        </label>
                    </div>
                </div>

                <div class="col mx-4">
                    <h3>Facility</h3>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Wifi" name="facility[]" id="facility"
                            checked>
                        <label class="form-check-label" for="facility">
                            Wifi
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Microphone" name="facility[]"
                            id="facility">
                        <label class="form-check-label" for="facility">
                            Microphone
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Projector" name="facility[]"
                            id="facility">
                        <label class="form-check-label" for="facility">
                            Projector
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Printer" name="facility[]" id="facility">
                        <label class="form-check-label" for="facility">
                            Printer
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Video Conference" name="facility[]"
                            id="facility">
                        <label class="form-check-label" for="facility">
                            Video Conference
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Monitor" name="facility[]" id="facility">
                        <label class="form-check-label" for="facility">
                            Monitor
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Computer" name="facility[]"
                            id="facility">
                        <label class="form-check-label" for="facility">
                            Computer
                        </label>
                    </div>
                </div>

                <div class="col mx-4">
                    <h3>Decoration</h3>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Indoor" name="decoration[]"
                            id="decoration">
                        <label class="form-check-label" for="decoration">
                            Indoor
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Outdoor" name="decoration[]"
                            id="decoration">
                        <label class="form-check-label" for="decoration">
                            Outdoor
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Stage Design" name="decoration[]"
                            id="decoration">
                        <label class="form-check-label" for="decoration">
                            Stage Design
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Flower" name="decoration[]"
                            id="decoration">
                        <label class="form-check-label" for="decoration">
                            Flower
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Seating Arrangement" name="decoration[]"
                            id="decoration" checked>
                        <label class="form-check-label" for="decoration">
                            Seating Arrangement
                        </label>
                    </div>
                    <div class="my-4 form-check">
                        <input class="form-check-input" type="checkbox" value="Entrence Design" name="decoration[]"
                            id="decoration">
                        <label class="form-check-label" for="decoration">
                            Entrence Design
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" name="ssubmit" class="m-3 px-4 mx-4 btn btn-outline-success">Submit</button>
        </form>
    </div>
</body>

</html>
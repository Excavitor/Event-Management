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


if (isset($_POST['psubmit'])) {

$name = $_POST['name'];
$phone = $_POST['phone'];

foreach($name as $index => $names)
    {
        $s_name = $names;
        $s_phone = $phone[$index];

        $di = "insert into people(name,phone_number,user_id,cid) values('$s_name','$s_phone','$id','$cid')";
        $di_run = mysqli_query($db, $di);
    }
if($di_run){
    echo ("<script>
    
    window.location.href='i_service.php';
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
    <title>People Information</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Add More People for Your Event
                            <a href="javascript:void(0)" class="add-more-form float-end btn btn-success">ADD More
                                People</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

                            <div class="main-form mt-3 border-bottom">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">Name</label>
                                            <input type="text" name="name[]" class="form-control" required
                                                placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="phone[]" class="form-control" required
                                                placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="paste-new-forms"></div>

                            <button type="submit" name="psubmit" class="btn px-4 btn-success">Next</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.main-form').remove();
            });

            $(document).on('click', '.add-more-form', function () {
                $('.paste-new-forms').append('<div class="main-form mt-3 border-bottom">\
                                <div class="row">\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">Name</label>\
                                            <input type="text" name="name[]" class="form-control" required placeholder="Enter Name">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">Phone Number</label>\
                                            <input type="text" name="phone[]" class="form-control" required placeholder="Enter Phone Number">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <br>\
                                            <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>');
            });

        });
    </script>
</body>

</html>
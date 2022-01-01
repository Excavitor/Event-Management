<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Sign in Page</title>

    <style>
        .btn-color {
            background-color: #0e1c36;
            color: #fff;

        }

        .profile-image-pic {
            height: 200px;
            width: 200px;
            object-fit: cover;
        }



        .cardbody-color {
            background-color: #ebf2fa;
        }

        a {
            text-decoration: none;
        }
    </style>

</head>

<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-success mt-5">Login Form</h2>
                <div class="card my-5">

                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="card-body cardbody-color p-lg-5">

                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
                                class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                                alt="profile">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" placeholder="User Name">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="password">
                        </div>
                        <div class="text-center"><button type="submit" name="sign_in"
                                class="btn btn-color px-5 mb-5 w-100">Login</button></div>
                        <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                            Registered? <a href="sign_up.php" class="text-dark fw-bold"> Create an
                                Account</a>
                        </div>
                    </form>

                    <?php

                        if(isset($_POST['sign_in'])){

                        include '../connection.php';

                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $dr = "select user_name, password from users where 
                        user_name = '{$username}' and password = '{$password}'";

                        $res = mysqli_query($db, $dr);

                        if(mysqli_num_rows($res)>0){
                                while($co = mysqli_fetch_assoc($res)){
                                    session_start();
                                    $_SESSION["username"] = $co['username'];
                                    $_SESSION["password"] = $co['password'];
                                    header("Location: ../event_book_record.php");
                            }
                        }
                        else{
                            echo "<script>alert('Wrong Entered.')</script>";
                        }
    
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php 

include '../connection.php';

session_start();


if (isset($_POST['sign_up'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];


	if ($password == $cpassword) {
		$dr = "SELECT * FROM users WHERE email='$email' and password = '$password'";
		$res = mysqli_query($db, $dr);
		if (!mysqli_num_rows($res)>0) {
			$dr = "INSERT INTO users (user_name, password, email)
					VALUES ('$username', '$password', '$email')";
			$result = mysqli_query($db, $dr);
			if ($result) {
				echo ("<script>
                window.alert('Registration Complete');
                window.location.href='../event_book_record.php';
                </script>");
			} else {
				echo "<script>alert('Something Went Wrong.')</script>";
			}
		} else {
			echo "<script>alert('Already Exists.')</script>";
		}
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
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
    <title>Register Form</title>
</head>
<body>
	<div class="container">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="login-email card-body cardbody-color p-lg-5">
        <div class="text-center">
             <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
             class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
             alt="profile">
            </div>    
            <p class="login-text text-center text-success" style="font-size: 2rem; font-weight: 800;">Register</p>

			<div class="input-group mb-3">
				<input type="text" class="form-control" placeholder="Username" name="username" required>
			</div>
			<div class="input-group mb-3">
				<input type="email" class="form-control" placeholder="Email" name="email" required>
			</div>
			<div class="input-group mb-3">
				<input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="input-group mb-3">
				<input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required>
			</div>
			<div class="input-group text-center">
            <button type="submit" name="sign_up" class="btn btn-color px-5 mb-5 w-100">Resister</button>
			</div>

			<div id="emailHelp" class="form-text text-center mb-5 text-dark">Have an Account?
                <a href="sign_in.php" class="text-success fw-bold"> Sign in</a>
            </div>
		</form>
	</div>
</body>
</html>
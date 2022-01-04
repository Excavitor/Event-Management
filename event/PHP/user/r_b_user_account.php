<?php
session_start();
include '../connection.php';
?>

<div class="container my-4">
  <div class="text-success text-center text-uppercase">
    <h4>
      <?php
        echo "welcome: ". $_SESSION["username"];
      ?>
      <a class="btn btn-outline-success float-end" href="../sign/sign_out.php">Log out</a>
    </h4>
  </div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>User Account</title>
</head>
<body>
  <div class="container-fluid">
    <div class="card-body bg-warning text-dark text-center">
      <h2>
      Click to See your Event details
      </h2>  
    
    </div>
  </div>

  <div class="container my-4">
    <div class="row">
      <div class="card">
        <div class="card-header">
          <h5>
            Public Events
          </h5>
        </div>
        <div class="card-body">
          <a href="concert_account.php" class="col-4 m-3">
            <button class="btn btn-outline-success">
             Concert Event
            </button>
          </a>
          <a href="#" class="col-4 m-3">
            <button class="btn btn-outline-success">
            Seminar Event
            </button>
          </a>
          <a href="#" class="col-4 m-3">
            <button class="btn btn-outline-success">
            Competition Event
            </button>
          </a>
        </div>
      </div>
    </div>

    <div class="row my-4">
      <div class="card">
        <div class="card-header">
          <h5>
            Private Events
          </h5>
        </div>
        <div class="card-body">
          <a href="#" class="col-4 m-3">
            <button class="btn btn-outline-success">
            Engagement Event
            </button>
          </a>
          <a href="#" class="col-4 m-3">
            <button class="btn btn-outline-success">
            Wedding Event
            </button>
          </a>
          <a href="#" class="col-4 m-3">
            <button class="btn btn-outline-success">
            Birthday Event
            </button>
          </a>
        </div>
      </div>
    </div>

    <div class="row my-4">
      <div class="card">
        <div class="card-header">
          <h5>
            Corporate Events
          </h5>
        </div>
        <div class="card-body">
          <a href="#" class="col-4 m-3">
            <button class="btn btn-outline-success">
            Conference Event
            </button>
          </a>
          <a href="#" class="col-4 m-3">
            <button class="btn btn-outline-success">
            Meeting Event
            </button>
          </a>
          <a href="#" class="col-4 m-3">
            <button class="btn btn-outline-success">
            Product Launch Event
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
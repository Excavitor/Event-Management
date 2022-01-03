<?php
session_start();
include '../connection.php';

$see = $_GET['see'];
?>

<div class="container my-3">
  <div class="text-success text-uppercase">
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
    
    <title>See More Page</title>
</head>
<body>
<div class="container border">
<table class="my-4 text-center table table-hover table-borderless">
  <thead class="table-dark">
    <tr>
      <th scope="col">Organization Name</th>
      <th scope="col">Organization Email</th>
      <th scope="col">Organization Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Social Media Link</th>
      <th scope="col">Date(from-to)</th>
    </tr>
  </thead>

  <?php
    $sql = "SELECT organization_name,organization_email, organization_phone, concat_ws(', ',street, city, zip) as ads, social_media_link, concat_ws(', ',date_from, date_to) as dt
    FROM concert where cid = {$see}";
    $result = mysqli_query($db, $sql);
    while($row1 = mysqli_fetch_assoc($result)){
      ?>
      <tr>
      <th scope="row"><?php echo $row1['organization_name']; ?></th>
      <td><?php echo $row1['organization_email']; ?></td>
      <td><?php echo $row1['organization_phone']; ?></td>
      <td><?php echo $row1['ads']; ?></td>
      <td><?php echo $row1['social_media_link']; ?></td>
      <td><?php echo $row1['dt']; ?></td>
      </tr>
      <?php
    }
  ?>

</table>

<table class="my-4 mt-5 text-center table table-hover table-borderless">
  <thead class="table-dark">
    <tr>
      <th scope="col">People Name</th>
      <th scope="col">Phone Number</th>
    </tr>
  </thead>

  <?php
    $sql1 = "SELECT name, phone_number
    FROM people where cid = {$see}";
    $result1 = mysqli_query($db, $sql1);
    while($row2 = mysqli_fetch_assoc($result1)){
      ?>
      <tr>
      <th scope="row"><?php echo $row2['name']; ?></th>
      <td><?php echo $row2['phone_number']; ?></td>
      </tr>
      <?php
    }
  ?>
</table>
</div>
</body>
</html>
<?php
session_start();
include '../connection.php';
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
    <title>User Account</title>
</head>
<body>


<?php
$username = $_SESSION["username"];
// echo $username;
$query = mysqli_query($db, "select * from users where user_name = '$username'");
$row = mysqli_fetch_array($query);
// print_r($row);
$id = $row['user_id'];
// where user_id = $id
?>




<div class="container border">
    <button class="my-2 px-3 btn btn-success float-end">Sort</button>
<table class="my-1 text-center table table-hover table-borderless">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Event Name</th>
      <th scope="col">Event Type</th>
      <th scope="col">Date(from)</th>
      <th scope="col">Date(to)</th>
      <th scope="col">Cancel Event</th>
      <th scope="col">See More</th>
    </tr>
  </thead>
  
  <?php
    $sql = "SELECT cid,event_name, event_type, date_from, date_to FROM concert where user_id = $id";
    $result = mysqli_query($db, $sql);
    while($row1 = mysqli_fetch_assoc($result)){
      ?>
      <tr>
      <th scope="row"><?php echo $row1['cid']; ?></th>
      <td><?php echo $row1['event_name']; ?></td>
      <td><?php echo $row1['event_type']; ?></td>
      <td><?php echo $row1['date_from']; ?></td>
      <td><?php echo $row1['date_to']; ?></td>
      <td>
        <a href="delete.php?delete=<?php echo $row1['cid']; ?>" class="btn btn-danger">Cancel</a>
      </td>
      <td>
        <a href="see_more.php?see=<?php echo $row1['cid']; ?>" class="btn btn-primary">See More></a>
      </td>
      </tr>
      <?php
    }
  ?>
</table>
</div>
</body>
</html>
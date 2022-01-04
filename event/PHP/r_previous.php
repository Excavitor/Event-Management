<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Previous Events</title>
</head>
<body>
    <div class="container-fluid mb-4">
        <div class="card">
            <div class="card-header bg-warning text-center text-dark">
                <h1>Previous Event</h1>
            </div>
        </div>
    </div>

    <div class="container">
    <table class="my-1 text-center table table-hover table-borderless">
  <thead class="table-dark">
    <tr>
      <th scope="col">Event Name</th>
      <th scope="col">Event Type</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Date(from-to)</th>
    </tr>
  </thead>
  
  <?php
    include 'connection.php';
    $sql = "SELECT event_name, event_type, organization_name, organization_email, 
    concat_ws(', ',date_from,date_to) as dat FROM concert";
    $result = mysqli_query($db, $sql);
    while($row1 = mysqli_fetch_assoc($result)){
      ?>
      <tr>
      <td><?php echo $row1['event_name']; ?></td>
      <td><?php echo $row1['event_type']; ?></td>
      <td><?php echo $row1['organization_name']; ?></td>
      <td><?php echo $row1['organization_email']; ?></td>
      <td><?php echo $row1['dat']; ?></td>
      </tr>
      <?php
    }
  ?>
</table>
</div>
    
</body>
</html>
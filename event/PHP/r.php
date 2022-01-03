<?php 
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Document</title>
</head>
<body class="container bg-light">
<?php
$dr = "select * from saad_new";

$res = mysqli_query($db, $dr);

if(mysqli_num_rows($res)>0){
    while($co = mysqli_fetch_assoc($res)){
        ?>
        <form class="my-5">
        <div class="row mx-3">
        <input class="col form-control" type="text" value="<?php echo $co['name']; ?>"  disabled style="margin-right: 5px;">
        <input class="col form-control" type="text" value="<?php echo $co['id']; ?>" disabled style="margin-right: 5px;">
        <input class="col form-control" type="text" value="<?php echo $co['university']; ?>" disabled style="margin-right: 5px;">
        <input class="col form-control" type="text" value="<?php echo $co['course']; ?>" disabled style="margin-right: 5px;">
        </div>
        </form>
        
        <?php
    }
}
else{
    echo "0 result";
}
?>
</body>
</html>

.....................................



<!DOCTYPE html>
<html>

<head>
    <title>
        CSE311 Show Info
    </title>
</head>

<body>
   <h2>Student Info</h2>

<table>

    <tr>
        <th>ID</th>
        <th>Student_Name</th>
    </tr>

<?php
$db = mysqli_connect("localhost", "root", "", "cse311_10");

if(!$db)
{
    die("Connection error: " . mysqli_connect_error());
}
else
{
    echo "Connection Success " . "<br>";
}

$sql = "SELECT id, student_name FROM student_info";
$result = mysqli_query($db, $sql);
while($row = mysqli_fetch_assoc($result))
    {
    ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['student_name']; ?></td>
        </tr>
    <?php
    }

?>

</table>

</body>

</html>

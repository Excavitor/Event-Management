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
    <div class="container">
        <h3 class="text-center mt-5 text-success">Bookings</h3>

        <table class="mt-4 table text-center table-hover table-bordered border-success">
            <thead>
                <tr>
                    <th scope="col">Event Type</th>
                    <th scope="col">Date From</th>
                    <th scope="col">Date To</th>
                    <th scope="col">Cancel</th>
                    <th scope="col">Edit</th>
                    <th scope="col">See More</th>
                </tr>
            </thead>


            <?php 
            include 'connection.php';

            //$di = "select ";
            

            ?>


            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>
                        <button type="submit" class="btn btn-outline-success">
                            Cancel
                        </button>
                    </td>
                    <td><button type="submit" class="btn btn-outline-success">
                            Edit
                        </button></td>
                    <td><button type="submit" class="btn btn-outline-success">
                            See More
                        </button></td>
                </tr>
            </tbody>
        </table>

    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .container{
            margin:0px;
        }
    </style>
    <title>MySite</title>
</head>

<body>
    <?php
    session_start();
    $email = $_SESSION['email'];
    $image = "";
    $connection = mysqli_connect('localhost', 'root', '', 'myform');

    $sql = "SELECT * FROM registration WHERE email='$email'";

    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    $image = $row['photo'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $address = $row['addressDetails']

        ?>
    <div class="container">
        <div class="row" style="width:100vw;height:100vh">
            <div class="col d-flex justify-content-center align-items-center" style="padding:40px;">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $fname.' '.$lname?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $email?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo $address?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col d-flex justify-content-center align-items-center" style="background-color:#F88379">
                <img src="image/<?php echo $image ?>" alt="Your Image" style="border-radius: 70%; width: 300px; height: 300px;">
            </div>
        </div>

    </div>
</body>

</html>
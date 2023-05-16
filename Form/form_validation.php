<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'myform');
$fnameErr = $lnameErr = $emailErr = $addressErr = $imageErr = "";
$fname = $lname = $email = $address = $image = "";


if (isset($_POST["submit"])) {
    $fname = test_input($_POST['fname']);
    $lname = test_input($_POST['lname']);
    $email = test_input($_POST['email']);
    $address = test_input($_POST['address']);
    $image = $_FILES['image']['name'];


    if (empty($fname)) {
        $fnameErr = "First name is required";
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            $fnameErr = "Only letters and white space allowed";
        } else {
            $fnameErr = "";
        }
    }

    if (empty($lname)) {
        $lnameErr = "Last name is required";
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
            $lnameErr = "Only letters and white space allowed";
        } else {
            $lnameErr = "";
        }
    }

    if (empty($email)) {
        $emailErr = "Email is required";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else {
            $emailErr = "";
        }
    }

    if (empty($address)) {
        $addressErr = "Address is required";
    } else {
        $addressErr = "";
    }

    if (empty($image)) {
        $imageErr = "Image is required";
    } else {
        $fileType = $_FILES['image']['type'];
        $fileSize = $_FILES['image']['size'];
        $isImage = substr($fileType, 0, strpos($fileType, '/'));
        if ($isImage != 'image') {
            $imageErr = "Please select an image file";
        } else {
            if ($fileSize >= 300000) {
                $imageErr = "File size must be less than 300kb";
            } else {
                $imageErr = "";
            }
        }
    }

    if ($fnameErr == "" && $lnameErr == "" && $emailErr == "" && $addressErr == "" && $imageErr == "") {
        $tempImage = $_FILES['image']['tmp_name'];
        $upLocation = 'image/';
        $counter = 0;
        $extension = substr($image, strpos($image, '.'));
        while (file_exists($upLocation . '' . $counter . $extension)) {
            $counter++;
        }
        $_SESSION['email'] = $email;
        move_uploaded_file($tempImage, $upLocation . $counter . $extension);

        $insert = "INSERT INTO registration(fname, lname, email, addressDetails, photo) VALUES('$fname','$lname','$email','$address','$counter$extension')";

        $emailExist = "SELECT * FROM registration WHERE email='$email'";

        $data = mysqli_query($connection, $emailExist);
        $row = mysqli_fetch_assoc($data);
        if ($row) {
            $emailErr = "Account already exists";
        } else {
            if (mysqli_query($connection, $insert)) {
                header("Location:profile.php");
                mysqli_close($connection);
            }
        }

    }

}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
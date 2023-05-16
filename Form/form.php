<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>MySite</title>
</head>

<body>
    <?php
    include 'form_validation.php';
    ?>
    <div class="container">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-2">First Name:</div>
                <div class="col-md-4">
                    <input id="fname" type="text" name="fname" class="form-control" value="<?php echo $fname; ?>">
                    <p id="error">
                        *
                        <?php echo $fnameErr ?>
                    </p>
                </div>

                <div class="col-md-2 text-end">Last Name:</div>
                <div class="col-md-4">
                    <input id="lname" type="text" name="lname" class="form-control" value="<?php echo $lname; ?>">
                    <p id="error">
                        *
                        <?php echo $lnameErr ?>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">Email:</div>
                <div class="col-md-10">
                    <input id="email" type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                    <p id="error">
                        *
                        <?php echo $emailErr ?>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">Address:</div>
                <div class="col-md-10">
                    <textarea name="address" id="address" cols="30" rows="3"
                        class="form-control"><?php echo $address ?></textarea>
                    <p id="error">
                        *
                        <?php echo $addressErr ?>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">Photo:</div>
                <div class="col-md-10">
                    <input id="image" type="file" class="form-control" name="image">
                    <p id="error">
                        *
                        <?php echo $imageErr ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="submit" class="form-control btn btn-primary" name="submit">
                </div>
                <div class="col-md-6">
                    <input type="button" class="form-control btn btn-danger" name="reset" onclick="customReset()"
                        value="Cancel">
                </div>
            </div>
        </form>
    </div>

    <script>
        function customReset() {
            document.getElementById("fname").value = "";
            document.getElementById("lname").value = "";
            document.getElementById("email").value = "";
            document.getElementById("address").value = "";
            document.getElementById("image").value = "";

            var errors = document.querySelectorAll("#error");
            for (let i = 0; i < error.length; i++) {
                errors[i].innerHTML = "*";
            }
        }
    </script>
</body>

</html>
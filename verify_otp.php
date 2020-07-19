<?php
    session_start();
    $alert = false;
    $errorAlert = false;

    if(isset($_POST['verify'])) {
        $otp = $_POST['otp'];

        if($otp == $_SESSION['otp']) {
            $alert = true;
            session_unset();
            session_destroy();
            
        } else {
            $errorAlert = true;
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>OTP</title>
</head>

<body>
    <?php
        if($alert) {
            echo '<div class="alert alert-success alert-dismissible fade show sticky-top" role="alert">
                    <strong>Success: </strong> OTP Verified.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
        if($errorAlert) {
            echo '<div class="alert alert-danger alert-dismissible fade show sticky-top" role="alert">
                    <strong>Error: </strong> OTP is not verify. Try agian.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h1 class="my-3">Verify OTP</h1>
                <br>
                <h3>OTP is sent at <?php echo $_SESSION['email']; ?></h3>
                <br>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="form-group">
                        <label for="otp">Enter OTP</label>
                        <input type="text" class="form-control" id="otp" name="otp" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Do not share your OTP with anyone
                            else.</small>
                    </div>

                    <button type="submit" class="btn btn-primary" name="verify">Verify OTP</button>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>
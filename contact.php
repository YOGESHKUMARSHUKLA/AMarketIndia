<?php
require_once "config.php";

$username=$name = $email = $subject = $message = $mobile = "";
$name_err = $email_err = $subject_err = $message_err = "d";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if username is empty
    // if (empty(trim($_POST["username"]))) {
    //     $username_err = "name cannot be blank";
    // } else {
    //     $sql = "SELECT name FROM datacustomer WHERE name = ?";
    //     $stmt = mysqli_prepare($conn, $sql);
    //     if ($stmt) {
    //         mysqli_stmt_bind_param($stmt, "s", $param_name);

    //         // Set the value of param username
    //         $param_name = trim($_POST['username']);

    //         // Try to execute this statement
    //         if (mysqli_stmt_execute($stmt)) {
    //             mysqli_stmt_store_result($stmt);
    //             if (mysqli_stmt_num_rows($stmt) == 1) {
    //                 $name = trim($_POST['username']);
    //                 //   $username_err = "This username is already taken";
    //             } else {
    //                 $name = trim($_POST['username']);
    //             }
    //         } else {
    //             echo "Something went wrong";
    //         }
    //     }
    // }

    // mysqli_stmt_close($stmt);


    // Check for email
    // if (empty(trim($_POST['email']))) {
    //     $email_err = "email cannot be blank";
    // } elseif (strpos(trim($_POST['email']), '@') !== true) {
    //     $email_err = "email cannot be without @";
    // } else {
    //     $email = trim($_POST['email']);
    // }
    // echo "No Error";
    $name=$_POST['username'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    // $name="YKS";
    // $email="email@e.com";
    // $subject="subject";
    // $message="message";
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    // If there were no errors, go ahead and insert into the database
    // if (empty($name_err) && empty($email_err)) {
        $sql = "INSERT INTO datacustomer (name, email, subject, message, mobile) VALUES (?, ?, ?, ? ,?)";
        $stmt = mysqli_prepare($conn, $sql);
        // echo "$stmt";
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_email, $param_subject, $param_message, $param_mobile);

            // Set these parameters
            $param_name = $name;
            $param_email = $email;
            $param_subject = $subject;
            $param_message = $message;
            $param_mobile = $mobile;

            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                header("location: sent.php");
            } else {
                echo "Something went wrong... cannot redirect!";
            }
        // }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}

?>
















<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Welcome to AMarketIndia - Heaven for Women">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Contact - AMarketIndia - Heaven for Women</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/AMarketIndia/index.html">
                <img src="/AMarketIndia/img/Logo.JPG" alt="" width="30" height="24">
            </a>
            <a class="navbar-brand" href="/AMarketIndia/index.html">A Market India</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/AMarketIndia/index.html">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/AMarketIndia/service.html">Services</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="/about.html">About</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="/AMarketIndia/contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/AMarketIndia/register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/AMarketIndia/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/AMarketIndia/logout.php">Logout</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">Action</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li> -->
                </ul>
                <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> Diwali Alert
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>

    <div class="container">
        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Mobile No</label>
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="99999XXXXX">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
            </div>
            <!-- <div class="col-auto"> -->
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            <!-- </div> -->
        </form>
    </div>
    <footer class="container">
        <p class="float-end"><a href="/contact.html">Back to top</a></p>
        <p>© 2021–2022 Company, AMarketIndia Inc. · @DevelopedBy Yogesh Shukla <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
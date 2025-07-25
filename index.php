<html>

<head>
    <script src="jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
</head>

</html>

<?php
include("config.php");
session_start();
//    include("index.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $myusername = mysqli_real_escape_string($db, $_POST['email']);
    $mypassword = mysqli_real_escape_string($db, $_POST['pass']);

    $sql = "SELECT * FROM faculty2 WHERE id = '$myusername' and pass = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //$active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row


    if ($count == 1) {
        // session_register("myusername");
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['login_user'] = $myusername;

?>
        <script>
            swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Login Successfully'
            }).then(function() {
                window.location = "student_date.php";
            });
        </script>
    <?php

    } else {
    ?>
        <script>
            swal.fire({
                icon: 'error',
                title: 'Login Failure',
                text: 'Check login credentials'
            }).then(function() {
                window.location = "index.php";
            });
        </script>
<?php
    }
}
?>
<html dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIC</title>
    <link rel="icon" type="image/png" sizes="32x32" href="image/icons/mkce_s.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-5/bootstrap-5.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

</head>

<body class="bg-dark d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark text-white border-secondary">
                    <div class="card-body text-center">
                        <h2 class="mb-3"><b>Discipline Management System</b></h2>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mt-3">
                            <div class="mb-3">
                                <img src="image/logo2.png" alt="logo" class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-success text-white"><i
                                            class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="FacultyID" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="input-group mt-3">
                                    <span class="input-group-text bg-warning text-white"><i
                                            class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="pass" name="pass"
                                        placeholder="Password" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-info" id="to-recover" type="button"><i class="bi bi-key"></i>
                                    Lost password?</button>
                                <button class="btn btn-success" type="submit">Login</button>
                            </div>
                        </form>
                        <div id="recoverform" class="d-none mt-3">
                            <p>Enter your email below and we will send you password recovery instructions.</p>
                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-danger text-white"><i
                                            class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="recover-email"
                                        placeholder="Email Address">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-success" id="to-login">Back To Login</button>
                                <button class="btn btn-info" type="button">Recover</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("to-recover").addEventListener("click", function() {
            document.querySelector("form").classList.add("d-none");
            document.getElementById("recoverform").classList.remove("d-none");
        });

        document.getElementById("to-login").addEventListener("click", function() {
            document.querySelector("form").classList.remove("d-none");
            document.getElementById("recoverform").classList.add("d-none");
        });
    </script>

</body>

</html>
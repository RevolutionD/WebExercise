<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = 'home';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

?>

<!doctype html>
<html lang="en">
<?php include "../includes/head.php"; ?>

<body>
    <?php include "../includes/header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="row justify-content-center mt-5">
                <div class="col-9">
                    <h5>ADMIN HOME</h5>
                    <hr />

                    <div class="row justify-content-between mt-5">
                        <div class="col-3 border border-info-subtle rounded text-center text-info-emphasis py-3">
                            <i class="fa fa-book fa-5x"></i>
                            <h3>0</h3>
                            <p>Books</p>
                        </div>
                        <div class="col-3 border border-success rounded text-center text-success py-3">
                            <i class="fa fa-recycle fa-5x"></i>
                            <h3>0</h3>
                            <p>Book not returned</p>
                        </div>
                        <div class="col-3 border border-primary-subtle rounded text-center text-primary-emphasis py-3">
                            <i class="fa fa-users fa-5x"></i>
                            <h3>0</h3>
                            <p>Users</p>
                        </div>
                    </div>

                    <div class="row justify-content-around mt-5">
                        <div class="col-3 border border-success rounded text-center text-success py-3">
                            <i class="fa fa-user fa-5x"></i>
                            <h3>0</h3>
                            <p>Authors</p>
                        </div>
                        <div class="col-3 border border-danger-subtle rounded text-center text-danger-emphasis py-3">
                            <i class="fa fa-list-alt fa-5x"></i>
                            <h3>0</h3>
                            <p>Categories</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <?php include "../includes/footer.php"; ?>

</body>

</html>
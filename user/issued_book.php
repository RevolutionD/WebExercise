<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = 'issue';

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
        <div class="col">

            <!-- TITLE -->
            <div class="row justify-content-center mt-5 mb-1">
                <div class="col-9">
                    <h5>ISSUED BOOKS</h5>
                    <hr/>
                </div>
            </div>

            <!-- TABLE -->
            <div class="row justify-content-center">
                <div class="col-9">
                    <table class="table table-striped table-bordered table-responsive">
                        <thead class="table-dark">
                            <tr>
                                <th>Order</th>
                                <th>Book Name</th>
                                <th>Issued Date</th>
                                <th>Return Date</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>
</html>

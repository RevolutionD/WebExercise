<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = '';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

$id = $_SESSION['user_id'];

$sql = "SELECT `student_id`, `full_name`, `email`, `phone`,`create_at`, `update_at` FROM tbl_user WHERE id = :id";
$query = $conn->prepare($sql);
$query->bindParam(':id', $id);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);

if(isset($_POST['btn_update'])){
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];

    $sql = "UPDATE tbl_user SET full_name = :full_name, phone = :phone WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':full_name', $full_name);
    $query->bindParam(':phone', $phone);
    $query->bindParam(':id', $id);
    $query->execute();

    header("location: profile.php");
    // show notification
    echo "<script>alert('Update successfully!')</script>";
}

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
                    <h5>YOUR PROFILE</h5>
                    <hr/>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-7">
                    <div class="card">
                        <div class="card-header bg-danger-subtle">My Profile</div>
                        <div class="card-body">
                            <form action="" method="post">
                                <?php if($result->student_id != null) echo "<p><strong>Student id:</strong> $result->student_id</p>"; ?>
                                <p><strong>Register date:</strong> <?php echo "$result->create_at"?></p>
                                <p><strong>Last update:</strong> <?php echo "$result->update_at"?></p>
                                <div class="my-3">
                                    <label for="name" class="form-label">Input Full Name:</label>
                                    <input class="form-control shadow-sm" name="full_name" value="<?php echo "$result->full_name"?>" required>
                                </div>
                                <div class="my-3">
                                    <label for="phone" class="form-label">Input Phone Number:</label>
                                    <input type="number" class="form-control shadow-sm" name="phone" value="<?php echo "$result->phone"?>" required>
                                </div>
                                <div class="my-3">
                                    <label for="email" class="form-label">Input Email:</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo "$result->email"?>" disabled>
                                </div>
                                <button class="btn btn-danger text-white" type="submit" name="btn_update" value="update">Update</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "../includes/footer.php"; ?>
</body>
</html>

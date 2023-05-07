<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = '';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

if(isset($_POST['btn_update_password']) && $_POST['btn_update_password'] != '') {
    $sql = "SELECT US.id AS 'id', US.account_id AS 'account_id', AC.username AS 'username', AC.password AS 'password' FROM tbl_account AS AC JOIN tbl_user AS US ON AC.id = US.account_id WHERE US.id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $_SESSION['user_id']);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    $id = $result->account_id;
    $new_pass = md5($_POST['new_pass']);

    if(md5($_POST['old_pass']) == $result->password) {
        if($_POST['new_pass'] == $_POST['confirm_pass'] && $_POST['new_pass'] != '') {
            $sql = "UPDATE tbl_account SET password = :password WHERE id = :id";
            $query = $conn->prepare($sql);
            $query->bindParam(':password', $new_pass);
            $query->bindParam(':id', $id);
            $query->execute();
            echo "<script>alert('Password updated successfully!')</script>";
        } else {
            echo "<script>alert('New password and confirm password does not match!')</script>";
        }
    } else {
        echo "<script>alert('Old password is incorrect!')</script>";
    }
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
                    <h5>CHANGE YOUR PASSWORD</h5>
                    <hr/>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-7">
                    <div class="card">
                        <div class="card-header bg-info-subtle">Change Password Form</div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="my-3">
                                    <label for="old-pass" class="form-label">Input Old Password:</label>
                                    <input type="password" class="form-control shadow-sm" id="old-pass" name="old_pass" required>
                                </div>
                                <div class="my-3">
                                    <label for="new-pass" class="form-label">Input New Password:</label>
                                    <input type="password" class="form-control shadow-sm" id="new-pass" name="new_pass" required>
                                </div>
                                <div class="my-3">
                                    <label for="confirm-pass" class="form-label">Comfirm New Password:</label>
                                    <input type="password" class="form-control shadow-sm" id="confirm-pass" name="confirm_pass" required>
                                </div>
                                <button type="submit" class="btn btn-info text-white" name="btn_update_password" value="update">Update</button>
                            </form>
                            

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</body>
</html>

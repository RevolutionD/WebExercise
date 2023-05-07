<?php
    $head = (!isset($_SESSION['login']) || $_SESSION['login'] == '') ? "includes/head.php" : "../includes/head.php";
    $header = (!isset($_SESSION['login']) || $_SESSION['login'] == '') ? "includes/header.php" : "../includes/header.php";
    $fotter = (!isset($_SESSION['login']) || $_SESSION['login'] == '') ? "includes/footer.php" : "../includes/footer.php";
?>


<!doctype html>
<html lang="en">
<?php include $head; ?>
<body class="vh-100">
    <?php include $header; ?>

    <div class="container">
        <div class="col">
            
            <!-- CAROUSEL SLIDER -->
            <?php if(isset($intro_carousel)) include "intro.php" ?>

            <div class="row justify-content-center mt-5">
                <div class="col-9">
                    <h5 id="<?php if(isset($title_id)) echo $title_id;?>"><?php echo $title; ?></h5>
                    <hr/>
                </div>
            </div>

            <?php include $body_file; ?>
        </div>
    </div>

    <div class="h-25"></div>
    <?php include $fotter; ?>
</body>
</html>
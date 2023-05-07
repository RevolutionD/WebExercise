<nav class="navbar navbar-expand-sm">
    <?php if(isset($_SESSION['login']) && $_SESSION['login'] != ''):?>
        <div class="container-fluid justify-content-start">
            <img src="../assets/images/main-logo.png" alt="main-logo" width="10%" class="h-auto mx-5">
            <h3><strong>LIBRARY MANAGEMENT SYSTEM</strong></h3>
            <a class="btn btn-danger ms-auto me-5" href="../index.php">Logout</a>
        </div>
    <?php else:?>
        <div class="container-fluid justify-content-start">
            <img src="assets/images/main-logo.png" alt="main-logo" width="10%" class="h-auto mx-5">
            <h3><strong>LIBRARY MANAGEMENT SYSTEM</strong></h3>
        </div>
    <?php endif;?>
</nav>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid navbar-collapse collapse mx-5">
        <?php if(isset($_SESSION['login']) && $_SESSION['login'] == 'user'):?>
            <ul class="navbar-nav flex-wrap justify-content-end">
                <li class="nav-item">
                    <a class="nav-link <?php echo $_SESSION['active'] == 'home' ? 'active' : '';?>" href="user_home.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $_SESSION['active'] == 'issue' ? 'active' : '';?>" href="issued_book.php">ISSUED BOOKS</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">ACCOUNT</a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="profile.php">PROFILE</a>
                        <a class="dropdown-item" href="change_password.php">CHANGE PASSWORD</a>
                    </ul>
                </li>
            </ul>
        <?php elseif(isset($_SESSION['login']) && $_SESSION['login'] != ''):?>
            <ul class="navbar-nav flex-wrap justify-content-end">
                <li class="nav-item">
                    <a class="nav-link <?php echo $_SESSION['active'] == 'home' ? 'active' : '';?>" href="admin_home.php">HOME</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">CATEGORIES</a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="add_category.php">ADD CATEGORY</a>
                        <a class="dropdown-item" href="list_category.php">LIST CATEGORY</a>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">AUTHORS</a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="add_author.php">ADD AUTHOR</a>
                        <a class="dropdown-item" href="list_author.php">LIST AUTHOR</a>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">BOOKS</a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="add_book.php">ADD BOOK</a>
                        <a class="dropdown-item" href="list_book.php">LIST BOOK</a>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">ISSUE BOOKS</a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="add_issue.php">ISSUE NEW BOOK</a>
                        <a class="dropdown-item" href="list_issue.php">LIST ISSUED</a>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $_SESSION['active'] == 'user' ? 'active' : '';?>" href="list_user.php">LIST USER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $_SESSION['active'] == 'pass' ? 'active' : '';?>" href="change_password.php">CHANGE PASSWORD</a>
                </li>
            </ul>
        <?php else:?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo $_SESSION['active'] == 'home' ? 'active' : '';?>" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#user-login">USER LOGIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $_SESSION['active'] == 'user_register' ? 'active' : '';?>" href="user_register.php">USER REGISTER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $_SESSION['active'] == 'admin_login' ? 'active' : '';?>" href="admin_login.php">ADMIN LOGIN</a>
                </li>
            </ul>
        <?php endif;?>
    </div>
</nav>

<div class="container-fluid border border-1 border-dark"></div>




<nav class="navbar navbar-expand-sm">
    <div class="container-fluid justify-content-start">
        <img src="../assets/images/main-logo.png" alt="main-logo" width="10%" class="h-auto mx-5">
        <h3><strong>LIBRARY MANAGEMENT SYSTEM</strong></h3>
        @if(session('login') != '')
            <a class="btn btn-danger ms-auto me-5" href="/">Logout</a>
        @endif
    </div>
</nav>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid navbar-collapse collapse mx-5">
        @if(session('login') == 'user')
            <ul class="navbar-nav flex-wrap justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="user_home">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="issued_book">ISSUED BOOKS</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">ACCOUNT</a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="profile">PROFILE</a>
                        <a class="dropdown-item" href="change_password">CHANGE PASSWORD</a>
                    </ul>
                </li>
            </ul>
        @elseif(session('login') == 'admin')
            <ul class="navbar-nav flex-wrap justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="admin_home">HOME</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">CATEGORIES</a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="add_category">ADD CATEGORY</a>
                        <a class="dropdown-item" href="list_category">LIST CATEGORY</a>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">AUTHORS</a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="add_author">ADD AUTHOR</a>
                        <a class="dropdown-item" href="list_author">LIST AUTHOR</a>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">BOOKS</a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="add_book">ADD BOOK</a>
                        <a class="dropdown-item" href="list_book">LIST BOOK</a>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">ISSUE BOOKS</a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="add_issue">ISSUE NEW BOOK</a>
                        <a class="dropdown-item" href="list_issue">LIST ISSUED</a>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list_user">LIST USER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="change_password">CHANGE PASSWORD</a>
                </li>
            </ul>
        @else
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index#user-login">USER LOGIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_register">USER REGISTER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_login">ADMIN LOGIN</a>
                </li>
            </ul>
        @endif
    </div>
</nav>

<div class="container-fluid border border-1 border-dark"></div>




<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Management System</title>
    <?php if(isset($_SESSION['login']) && $_SESSION['login'] != ''):?>
        <link rel="icon" href="../assets/icons/favicon.png">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../assets/css/bootstrap-utilities.min.css" type="text/css">
        <link rel="stylesheet" href="../assets/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="../assets/css/font-awesome.css" type="text/css">
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <?php else:?>
        <link rel="icon" href="assets/icons/favicon.png">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="assets/css/bootstrap-utilities.min.css" type="text/css">
        <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
        <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <?php endif;?>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
</head>
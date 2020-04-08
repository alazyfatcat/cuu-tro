<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title = 'Favorite Song Collection'; ?></title>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
<!-- navbar from https://www.w3schools.com/bootstrap4/bootstrap_navbar.asp -->
<nav class="navbar navbar-expand-md bg-navy navbar-dark">
    <!-- Brand -->

    <form method="post" action="save-upload.php" enctype="multipart/form-data">
        <fieldset>
            <label for="file1">Logo here:</label>
            <input name="file1" type="file" />
        </fieldset>
        <button>Upload Logo</button>
    </form>

    <?php
    require_once 'nav.php'
    ?>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="control_panel/admin.php">View Registered Users</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto"
        <?php
        if (empty($_SESSION['userId'])) {
            echo '<li class="nav-item">
                    <a class="nav-link" href="public%20site/register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="public%20site/login.php">Login</a>
                </li>';
        }
        else {
            echo '<li class="nav-item">
                    <a class="nav-link" href="#">' . $_SESSION['username'] . '</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>';
        }

        ?>
        </ul>
    </div>

</nav>

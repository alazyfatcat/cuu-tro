<?php
// set the page title so the header can display it
$title = 'Administrator';

// use the require_once function to embed the shared header here
require_once('../header.php');
?>


<h1>Registered User:</h1>

<?php

// connect
require_once '../db.php';

// set up & execute query
$sql = "SELECT * FROM register";
$cmd = $db->prepare($sql);
$cmd->execute();
$register = $cmd->fetchAll();

//  table
echo '<table class="table table-striped table-hover">
<thead><th>Username</th><th>Password</th><th>Delete</th></thead>';

// show USERS
foreach ($register as $value) {
    echo '<tr><td>';
        if (!empty($_SESSION['userId'])) {
            echo '<a href="save-registration.php?userId=' . $value['userId'] . '">' . $value['username'] . '</a>';
        }
        else {
            echo $value['username'];
        }

    echo '</td>
        <td>' . $value['password'] . '</td>
        ';


// delete USERS
        if (!empty($_SESSION['userId'])) {
            echo '<td><a class="text-danger" href="delete-user.php?userId=' . $value['userId'] . '"
                onclick="return confirmDelete();">Delete User </a></td>
            </tr>';
        }
}
echo '</table>';

?>

<!--Add page-->
<?php
if (!empty($_SESSION['userId'])) {
    echo '<a href="add-page.php">Add a New Page</a>';
} ?>


<div class="col-lg-6">
    <table class="table table-bordered">

        <tr>
            <?php
            //fetch every pages in the db
            $sql = "select * from pages";
            $cmd = $db -> prepare($sql);
            $cmd->execute();
            $pages = $cmd->fetchAll();

            //show pages
            echo '<table class="table table-striped table-hover">
                <thead><th>Pages</th><th>Delete</th><th>Edit</th></thead>';
            foreach ($pages as $value) {
                echo '<tr><td>';
                if (!empty($_SESSION['id'])) {
                    echo '<a href="index.php?id=' . $value['id'] . '">' . $value['title'] . '</a>';
                }
                else {
                    echo $value['title'];
                }

            // delete pages
                if (!empty($_SESSION['userId'])) {
                     echo '<td><a class="text-danger" href="delete-pages.php?id=' . $value['id'] . '"
                     onclick="return confirmDelete();"  class="btn btn-danger">Delete </a></td>';
                }

                if (!empty($_SESSION['userId'])) {
                    echo '<td><a class="text-danger" href="edit-pages.php?id=' . $value['id'] . '" class="btn btn-success">Edit </a></td></tr>';
                }
            }
            ?>
<!--            Edit pages-->
    </table>
</div>

<?php
require_once('../footer.php');
?>
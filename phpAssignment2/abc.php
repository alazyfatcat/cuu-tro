

<?php



// connect
require_once 'db.php';

// set up & execute query
$sql = "SELECT * FROM pages";
$cmd = $db->prepare($sql);
$cmd->execute();
$pages = $cmd->fetchAll();

// start table
echo '<table class="table table-striped table-hover">
<thead><th>Pages</th><th></th></thead>';

// loop through data and display the results
foreach ($pages as $value) {
    echo '<tr><td>';
    if (!empty($_SESSION['userId'])) {
        echo '<a href="musician-details.php?musicianId=' . $value['musicianId'] . '">' . $value['name'] . '</a>';
    }
    else {
        echo $value['name'];
    }

    echo '</td>
        <td>' . $value['recordLabel'] . '</td>
        <td>' . $value['ranking'] . '</td>
        <td>' . $value['solo'] . '</td>
        <td>' . $value['city'] . '</td>
        <td>';

    if (!empty($value['photo'])) {
        echo '<img src="img/musicians/' . $value['photo'] . '" alt="Musician Photo" class="thumbnail" />';
    }
    echo '</td>';

    // show delete links only to authenticated users
    if (!empty($_SESSION['userId'])) {
        echo '<td><a class="text-danger" href="delete-musician.php?musicianId=\' . $value[\'musicianId\'] . \'"
                onclick="return confirmDelete();">Delete</a></td>
            </tr>';
    }
}

echo '</table>';

require_once('footer.php');
?>

<?php
require_once '../db.php';

require_once '../header.php';

// auth check
require_once '../auth.php';

// save inputs
$id = $_POST['id'];  // we need the id if we are updating an existing record
$title = $_POST['title'];
$content = $_POST['content'];

// validate inputs
$ok = true; // variable to determine if we should save or not

// is the form ok?
if ($ok == true) {

    // set up insert or update
    if (empty($id)) {
        $sql = "INSERT INTO pages (title, content) VALUES (:title, :content)";
    }
    else {
        $sql = "UPDATE pages SET title = :title, content = :content WHERE id = :id";
    }

    $cmd = $db->prepare($sql);

    // bind the variables into the INSERT command
    $cmd->bindParam(':title', $title, PDO::PARAM_STR, 45);
    $cmd->bindParam(':content', $content, PDO::PARAM_STR, 2147483647);

    if (!empty($id)) {
        $cmd->bindParam(':id', $id, PDO::PARAM_INT);
    }

    // save to db
    $cmd->execute();

    // disconnect
    $db = null;

    //echo 'Musician Saved';
    header('location:admin.php');
}
?>

</body>
</html>

<?php

require_once('../db.php');

// embed header
require_once('../header.php');

// auth check => this page is only for authenticated users
require_once '../auth.php';

// initialize variables
$id = null;
$title = null;
$content = null;

// check if there's a musicianId in the url string
if (!empty($_GET['id'])) {
    // if there is a musicianId, query the db for the details on this record so we can populate the form
    $id = $_GET['id'];

    $sql = "SELECT * FROM pages WHERE id = $id";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':id', $id, PDO::PARAM_INT);
    $cmd->execute();
    $pages = $cmd->fetch();  // use fetch for a single record.  It's faster than fetchAll()

    // populate the variables from the query result
    $title = $pages['title'];
    $content = $pages['content'];

}
?>

<form method="post" action="save-page.php" enctype="multipart/form-data">
    <fieldset>
        <label for="title" class="col-md-2">Title: </label>
        <input name="title" id="title" required maxlength="100" value="<?php echo $title; ?>" />
    </fieldset>
    <fieldset>
        <label for="content" class="col-md-2">Content: </label>
        <input name="content" id="content"  value="<?php echo $content; ?>" />
    </fieldset>
    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
    <button class="offset-md-2 btn btn-primary">Save</button>
</form>


<?php
require_once('../footer.php');
?>

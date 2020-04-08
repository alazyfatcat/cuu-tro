<?php
require_once('../db.php');

// embed header
require_once('../header.php');

// auth check => this page is only for authenticated users
require_once '../auth.php';

if(isset($_GET['edit'])){
    $editId  = $_GET['edit'];
    $sql = "select * from pages where id = '$editId'";
    $result = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($result);

    ?>

    <form action="" method="post">
        <div class="form-group">
            <label>Edit Pages</label>
            <input type="text" name="pages" value="<?php echo $data['edit'] ?>" placeholder="pages" class="form-control pb-4">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit" name="btn_pages">Edit Page</button>
        </div>
    </form>

    <?php
}
?>
<?php

$id = $_GET['id'];

// connect
require_once '../db.php';

// set up SQL command to delete the selected record
$sql = 'DELETE FROM pages'.' WHERE id = :id';

// bind Parameter to pass in the selected id

$cmd = $db->prepare($sql);
$cmd->bindParam(':id', $id, PDO::PARAM_INT);

// execute the SQL command
$cmd->execute();

// disconnect
$db = null;

// take the user back to the list
header('location:admin.php');
?>


<?php
$username = $_POST['username'];
$password = $_POST['password'];

require_once 'db.php';

$sql = "SELECT userId, password FROM register WHERE username = :username";

$cmd = $db->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->execute();

$user = $cmd->fetch();

if (!password_verify($password, $user['password'])) {
    echo 'Invalid Login';
    exit();
}
else {
    // handle valid login
    session_start();
    $_SESSION['userId'] = $user['userId'];
    $_SESSION['username'] = $username;
    header ('location:admin.php');

}

$db = null;

?>
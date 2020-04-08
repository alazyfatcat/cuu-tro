<p>Saved ...</p>
<a href="login.php"> Login Page</a>
<?php
//form inputs
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$ok = true;

//Validate the inputs
if (empty($username)) {
    echo 'Username is required<br />';
    $ok = false;
}

if (empty($password)) {
    echo 'Password is required<br />';
    $ok = false;
}

if ($password != $confirm) {
    echo 'Passwords do not match';
    $ok = false;
}

if ($ok) {
    //connect
    require_once 'db.php';

    // 3a. check if username already exists
    $sql = "SELECT * FROM register WHERE username =:username";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->execute();
    $user = $cmd->fetch();

    // if Username already exists, stop execution and don't insert again
    if (!empty($user)) {
        echo 'Username already exists';
        exit();
    }

    // INSERT to users table
    $sql = "INSERT INTO register (username, password) VALUES (:username, :password)";
    $cmd = $db->prepare($sql);

    //hash the password before saving
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //Bind parameters and execute the insert
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->bindParam(':password', $hashedPassword, PDO::PARAM_STR, 255);
    $cmd->execute();

    //Disconnect
    $db = null;

}

?>

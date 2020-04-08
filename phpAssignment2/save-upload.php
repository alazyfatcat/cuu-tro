<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
$file = $_FILES['file1'];

// file name
$name = $file['name'];
echo "Name: $name<br />";


$size = $file['size'];
echo "Size: $size<br />";

// temporary path
$tmp_name = $file['tmp_name'];
echo "Temp Name: $tmp_name<br />";

// file type
$type = mime_content_type($tmp_name);
echo "Type: $type<br />";

// save file
if ($size < 5024000 && $type == 'image/jpeg') {
    // use the session to create a (mostly) unique name
    session_start();
    $name = session_id() . '-' . $name;

    move_uploaded_file($tmp_name, "uploads/$name");
}
else {
    echo "Invalid file";
}
?>

</body>
</html>

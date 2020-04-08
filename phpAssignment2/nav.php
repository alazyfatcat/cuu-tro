<?php
require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php
                        $sql = "SELECT * FROM pages";
                        $cmd = $db->prepare($sql);
                        $cmd->execute();
                        $musicians = $cmd->fetchAll();

                        foreach ($musicians as $value) {
                            echo '<tr><td>';
                                echo '<a href="index.php?Id=' . $value['id'] . '">' . $value['title'] . '</a>';
                        }
                        ?>
                    </ul>
                </div>

            </div>

        </nav>
    </body>
</html>
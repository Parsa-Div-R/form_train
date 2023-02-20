<!doctype html>
<html lang="en">
<?php
if (isset($_POST['submit'])){
    echo $_POST['user_name'];
    echo '<br>';
    echo $_POST['last_name'];
    echo '<br>';
    echo $_POST['user_email'];

}
?>
    <?php

        include 'form/header.php';
        include 'form/about_us_section.php';
        include 'form/footer.php';








    ?>
</html>
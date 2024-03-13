<?php
    require(__DIR__ . '/../src/user.php');
    if(isset($_POST['delete_lening'])){
        $nummer = $_POST['id_delete_lening'];
        $user = new User();
        $user->deleteLening($nummer);
        header("Location: admin.php");
    }
?>
<?php 
    require(__DIR__ . '/../src/user.php');
    
    if(isset($_POST['delete_user'])){
        $id = $_POST['id_delete'];
        $user = new User();
        $user->delete($id);
        header("Location: admin.php");
    }

?>
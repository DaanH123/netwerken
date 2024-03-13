<?php
require(__DIR__ . '/../src/user.php');
if(isset($_POST['btn_leen'])){
$user = new User();
$boek = $_POST['id_boek'];
$email = $_POST['email_leen'];
$result = $user->checkaantal($email);
if($result <3)
{
echo "Je kan niet nog een boek lenen";
}
else{
    $boek = $_POST['id_boek'];
    $email = $_POST['email_leen'];
    $user->leenconfirm($boek, $email);
    header("Location: home.php");
}

}


?>
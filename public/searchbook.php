<?php
require(__DIR__ . '/../src/user.php');

if(isset($_POST['button_search']))
{
    $user = new User();
    $section = $_POST['zoek'];
    $search_input = $_POST['search_input'];
    $user->searchBook($section, $search_input);
    header("Location: home.php");
}
?>
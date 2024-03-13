<?php
require('header.php');

if (isset($_POST['id_edit'])){
    $id = $_POST['id_edit'];
}else{
    $id = $_POST['id'];
}
$user = new User();
$update = false;
$firstname = null;
$lastname = null;
$email = null;
$password = null;
$type = null;
$user2 = $user->findBoek($id);

if (isset($_POST['edit_boek2'])) {
    $user->update($id, $_POST['titel'], $_POST['auteur'], $_POST['onderwerp'], $_POST['isbn'], $_POST['jaar'], $_POST['aanwezig']);
}

?>
<div class="edituserh2">
    <h2>Edit user</h2>
</div>
<form action="./edituser.php" method="post">
    <div class="edituser">
        <div class="login-lbl_boxes">
            <input type="hidden" name="id" value="<?php echo $user2['id'];?>">

            <input type="text" name="titel" id="" value="<?php echo $user2['titel']; ?>"><br>

            <input type="text" name="auteur" id="" value=" <?php echo $user2['auteur']; ?>"><br>

            <input type="text" name="onderwerp" id="" value="<?php echo $user2['onderwerp']; ?>"><br>

            <input type="text" name="isbn" id="" value="<?php echo $user2['isbn']; ?>"><br>

            <input type="text" name="jaar" id="" value="<?php echo $user2['jaar']; ?>"><br>

            <input type="text" name="aanwezig" id="" value="<?php echo $user2['aanwezig']; ?>">
        </div>
    </div>


    <div class="edituserBtn">
        <input type="submit" value="Edit" name="edit_boek2" class="btn btn-primary">
    </div>
</form>

<?php
require('footer.php');
?>
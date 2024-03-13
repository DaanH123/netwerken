<?php
require('header.php');
?>



<?php

    $user = new User();

    if(isset($_POST['adduser'])){
        $user->save($_POST['Titel'], $_POST['Auteur'], $_POST['Onderwerp'], $_POST['ISBN'], $_POST['Jaar'], $_POST['Aanwezig']);
    }
?>

<div class="add_user">
    <form action="./addboek.php" method="post">
        <h3>Add user</h3>
        <label for="">Titel</label><br>
        <input type="text" name="Titel" id=""><br>
        <label for="">Auteur</label><br>
        <input type="text" name="Auteur" id=""><br>
        <label for="">Onderwerp</label><br>
        <input type="text" name="onderwerp" id=""><br>
        <label for="">ISBN</label><br>
        <input type="text" name="ISBN" id=""><br>
        <label for="">Jaar</label><br>
        <input type="text" name="Jaar" id=""><br>
        <label for="">Aanwezig</label><br>
        <input type="text" name="Aanwezig" id=""><br><br>

        <input type="submit" name="adduser" id="" value="Add Boek" class="btn btn-success">
    </form>
</div>

<?php
require('footer.php');
?>
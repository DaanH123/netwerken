<?php
require('header.php');
if (isset($_POST['lenen_button'])) {
    $book = $_POST['boek_leen'];
    $user = new User();
    $boek = $user->leenboek($book);
}
?>


<?php
foreach ($boek as $boekinfo) {
?>
    <form action="./leenboekconfirm.php" method="post">
        <label for="">Boeknummer: <?php echo $boekinfo['id'] ?></label><br>
        <input type="hidden" name="id_boek" value="<?php echo $boekinfo['id'] ?>">
        <label for="">Titel: <?php echo $boekinfo['titel'] ?></label><br>
        <label for="">Auteur: <?php echo $boekinfo['auteur'] ?></label><br>
        <label for="">Jaar van uitgave: <?php echo $boekinfo['jaar'] ?></label><br><br>

        <label for="">Email:</label><br>
        <input type="text" name="email_leen" id=""><br><br>
        <input type="submit" value="Leen boek" class="btn btn-primary" name="btn_leen">
    </form>

<?php
}
require('footer.php');
?>
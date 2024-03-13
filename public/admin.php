<?php
require('header.php');
if($_SESSION['username'] == "")
{
    echo "Nice try but you cant acces the admin panel without logging in";
}
else{
?>

<p>Welkom op de admin pagina, klik <a href="logout.php">Hier</a> om uit te loggen</p>

<div class="adminpaneloptions">
    <div class="users">
        <div class="user_container">
            <div class="user2">
                <table class="table">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titel</th>
                        <th scope="col">auteur</th>
                        <th scope="col">onderwerp</th>
                        <th scope="col">isbn</th>
                        <th scope="col">jaar</th>
                        <th scope="col">Aanwezig</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        <th scope="col"><a href="./addboek.php" class="btn btn-success">Add boek</a></th>
                    </tr>

                    <?php

                    if (isset($_GET['del'])) {
                        $user->delete($_GET['del']);
                    }

                    $user = new user();
                    $user2 = $user->searchBook();
                    ?>
                    <?php
                    foreach ($user2 as $userInfo) {
                    ?>

                        <tr>
                            <td><?php echo $userInfo['id']; ?></td>
                            <td><?php echo $userInfo['titel']; ?></td>
                            <td><?php echo $userInfo['auteur']; ?></td>
                            <td><?php echo $userInfo['onderwerp']; ?></td>
                            <td><?php echo $userInfo['isbn']; ?></td>
                            <td><?php echo $userInfo['jaar']; ?></td>
                            <td><?php echo $userInfo['aanwezig']; ?></td>
                            <form action="./edituser.php" method="post">
                                <td>
                                    <input type="hidden" name="id_edit" value="<?php echo $userInfo['id']; ?>">
                                    <input type="submit" value="Edit" name="edit_user" class="btn btn-warning">
                                </td>
                            </form>

                            <form action="./deleteboek.php" method="post">
                                <input type="hidden" name="id_delete" value="<?php echo $userInfo['id']; ?>">
                                <td><input type="submit" value="Delete" name="delete_user" class="btn btn-danger"></td>
                            </form>
                        </tr>

                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>


<table class="table">
    <tr>
        <th>Nummer</th>
        <th>Boeknummer</th>
        <th>E-mailadres</th>
        <th>Actie</th>
    </tr>

    <tr>
        <?php
        $result = $user->getReservering();
        foreach ($result as $reservering) {
        ?>


            <td><?php echo $reservering['id']; ?></td>
            <td><?php echo $reservering['boek_id']; ?></td>
            <td><?php echo $reservering['emailadres']; ?></td>
            <form action="./deletelening.php" method="post">
                <input type="hidden" name="id_delete_lening" value="<?php echo $reservering['id']; ?>">
                <td><input type="submit" value="Delete" name="delete_lening" class="btn btn-danger"></td>
            </form>
    </tr>



<?php
        }
?>
</table>

<?php
}
require('footer.php');
?>
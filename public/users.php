<?php
require('header.php');
?>

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
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        <th scope="col"><a href="./adduser.php" class="btn btn-success">Add boek</a></th>
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

<?php
require('footer.php');
?>
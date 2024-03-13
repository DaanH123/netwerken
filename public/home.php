<?php
require('header.php');

//kreeg de zoekfunctie niet werkend
?>
<div class="searchform">
    <form action="#" method="post">
        <input type="radio" name="zoek" id="" value="titel">
        <label for="">Titel</label>

        <input type="radio" name="zoek" id="" value="auteur">
        <label for="">Auteur</label>

        <input type="radio" name="zoek" id="" value="isbn">
        <label for="">ISBN</label>

        <input type="radio" name="zoek" id="" value="jaar">
        <label for="">Jaar van uitgave</label>

        <input type="radio" name="zoek" id="" value="onderwerp">
        <label for="">Onderwerp</label><br>

        <label for="">Zoekterm</label>
        <input type="text" name="search_input" id=""><br>
        <input type="submit" value="Zoeken" class="btn btn-primary" name="button_search">
    </form>
</div>

<table class="table">
    <?php
    ?>
    <tr>
        <th scope="col">Boeknummer</th>
        <th scope="col">Titel</th>
        <th scope="col">Auteur</th>
        <th scope="col">Onderwerp</th>
        <th scope="col">ISBN</th>
        <th scope="col">Jaar van publicatie</th>
        <th scope="col">Aanwezig</th>
        <th scope="col">Lenen</th>
    </tr>


    <tr>
        <?php
        $user = new User();
        $boek = $user->searchBook();

        foreach ($boek as $boeksearch) {
        ?>
        <form action="./leenboek.php" method="post">
            <td><?php echo $boeksearch['id']; ?></td>
            <input type="hidden" name="boek_leen" value="<?php echo $boeksearch['id']; ?>">
            <td><?php echo $boeksearch['titel']; ?></td>
            <td><?php echo $boeksearch['auteur']; ?></td>
            <td><?php echo $boeksearch['onderwerp']; ?></td>
            <td><?php echo $boeksearch['isbn']; ?></td>
            <td><?php echo $boeksearch['jaar']; ?></td>
            <td>
                <?php if($boeksearch['aanwezig'] == 1)
                {
                    echo "Ja";
                } 
                else{
                    echo "Nee";
                }
                    ?>
            </td>
            <td>
                <?php if($boeksearch['aanwezig'] == 1)
                {
                    echo "<input type=submit value=lenen name=lenen_button>";
                }
                else{
                    echo "";
                }
                ?>
            </td>
    </tr>

    </form>

<?php
        }
?>
</table>

<?php
require('footer.php');
?>
<!--
This is the list page where the site will list everything from the database 
-->
<html>
        <table>

            <th>Name</th>
            <th>Level</th>
            <th>Item Level</th>
            <th>RaiderIO</th>
            <th>&nbsp;</th>

            <?php foreach($characters as $character) : ?>
            <tr>
                <td><?php echo $character['characterName']; ?></td>
                <td><?php echo $character['Level']; ?></td>
                <td><?php echo $character['ItemLevel']; ?></td>
                <td><?php echo $character['RaiderIO']; ?></td>
                <td><form action=".?action=delete" method="post">
                <input type="hidden" name="characterName"
                           value="<?php echo $character['characterName']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
                <td><form action=".?action=showEditForm" method="post">
                <input type="hidden" name="characterName"
                           value="<?php echo $character['characterName']; ?>">
                <input type="hidden" name="Level"
                           value="<?php echo $character['Level']; ?>">
                <input type="hidden" name="ItemLevel"
                           value="<?php echo $character['ItemLevel']; ?>">
                <input type="hidden" name="RaiderIO"
                           value="<?php echo $character['RaiderIO']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <?php endforeach; ?>
            </tr>

        </table>
    <div><a href=".?action=showAddForm">Add Character</a></div>
</html>

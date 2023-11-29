<html>
    <h2>Edit Character</h2>
    <form action=".?action=edit" method="post">
        <label>Name:</label>
        <input required type="text" name="characterName" value="<?php echo $_POST['characterName']; ?>" />
        <br>

        <label>Level:</label>
        <input required type="text" name="Level" value="<?php echo $_POST['Level']; ?>"/>
        <br>

        <label>RaiderIO:</label>
        <input required type="text" name="RaiderIO" value="<?php echo $_POST['RaiderIO']; ?>"/>
        <br>

        <label>Item Level:</label>
        <input required type="text" name="ItemLevel" value="<?php echo $_POST['ItemLevel']; ?>"/>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Enter" />
        <br>
    </form>
</html>
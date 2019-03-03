<?php include '../view/header.php'; ?>
<main>

    <h1>Army List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($armies as $army) : ?>
            <tr>
                <td><?php echo $army['armyName']; ?></td>
                <td>
                    <form id="delete_member_form"
                          action="index.php" method="post">
                        <input type="hidden" name="action" value="delete_army">
                        <input type="hidden" name="army_id"
                               value="<?php echo $army['armyID']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <h2>Add Army</h2>
    <form id="add_category_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_army">

        <label>Name:</label>
        <input type="input" name="name" style="margin-left:57px;" >
         
        <br>
        <br>
        
        <label>Description:</label>
        <input type="input" name="desc" style="margin-left:20px;" >
        
        <br>
        <br>

        <label>Rating:</label>
        <input type="input" name="rating" style="margin-left:54px;" >
               
        <input type="submit" value="Add" style="margin-left:20px;">
    </form>

    <p><a href="index.php?action=list_armies">List Army</a></p>

</main>
<?php include '../view/footer.php'; ?>
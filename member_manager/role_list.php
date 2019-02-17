<?php include '../view/header.php'; ?>
<main>

    <h1>Role List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($roles as $role) : ?>
        <tr>
            <td><?php echo $role['roleName']; ?></td>
            <td>
                <form id="delete_member_form"
                      action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_role">
                    <input type="hidden" name="role_id"
                           value="<?php echo $role['clan_roleID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <h2>Add Role</h2>
    <form id="add_category_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_role">

        <label>Name:</label>
        <input type="input" name="name">
        <input type="submit" value="Add">
    </form>

    <p><a href="index.php?action=list_members">List Members</a></p>

</main>
<?php include '../view/footer.php'; ?>
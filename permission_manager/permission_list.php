<?php include '../view/header.php'; ?>
<main>

    <h1>Permission List</h1>

    <aside>
        <!-- display a list of roles -->
        <h2>Roles</h2>
        <?php include '../view/role_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of permissions -->
        <h2><?php echo $role_name; ?></h2>
        <table>
            <tr>
                <th>Permissions</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($permissions as $permission) : ?>
                <tr>
                    <td><?php echo $permission['permissions']; ?></td>
                    <td><form action="." method="post">
                            <input type="hidden" name="action"
                                   value="show_edit_form">
                            <input type="hidden" name="permission_id"
                                   value="<?php echo $permission['permissionID']; ?>">
                            <input type="hidden" name="role_id"
                                   value="<?php echo $permission['clan_roleID']; ?>">
                            <input type="submit" value="Edit">
                        </form></td>
                    <td><form action="." method="post">
                            <input type="hidden" name="action"
                                   value="delete_permission">
                            <input type="hidden" name="permission_id"
                                   value="<?php echo $permission['permissionID']; ?>">
                            <input type="hidden" name="role_id"
                                   value="<?php echo $permission['clan_roleID']; ?>">
                            <input type="submit" value="Delete">
                        </form></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <p><a href="?action=show_add_form">Add Permissions</a></p>
        <p><a href="../index.php">Back</a></p>

    </section>

</main>
<?php include '../view/footer.php'; ?>
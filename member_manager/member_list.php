<?php include '../view/header.php'; ?>
<main>

    <h1>Member List</h1>

    <aside>
        <!-- display a list of roles -->
        <h2>Roles</h2>
        <?php include '../view/role_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of members -->
        <h2><?php echo $role_name; ?></h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Townhall</th>
                <th>League</th>
                <th>Level</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($members as $member) : ?>
            <tr>
                <td><?php echo $member['memberName']; ?></td>
                <td><?php echo $member['memberTownhall']; ?></td>
                <td><?php echo $member['memberLeague']; ?></td>
                <td><?php echo $member['memberLevel']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="member_id"
                           value="<?php echo $member['memberID']; ?>">
                    <input type="hidden" name="role_id"
                           value="<?php echo $member['clan_roleID']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_member">
                    <input type="hidden" name="member_id"
                           value="<?php echo $member['memberID']; ?>">
                    <input type="hidden" name="role_id"
                           value="<?php echo $member['clan_roleID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Member</a></p>
        <p><a href="?action=list_roles">List Roles</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>
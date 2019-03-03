<?php include '../view/header.php'; ?>
<main>
    <h1>Add Permission</h1>
    <form action="index.php" method="post" id="add_permission_form">
        <input type="hidden" name="action" value="add_permission">

        <label>Role:</label>
        <select name="role_id">
            <?php foreach ($roles as $role) : ?>
                <option value="<?php echo $role['clan_roleID']; ?>" style="margin-left:26px;">
                    <?php echo $role['roleName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Permission:</label>
        <input type="input" name="permission">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Permission">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_permissions">View Permissions List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>
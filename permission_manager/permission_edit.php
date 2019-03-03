<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Permission</h1>
    <form action="index.php" method="post" id="add_member_form">

        <input type="hidden" name="action" value="update_permission">

        <input type="hidden" name="permission_id"
               value="<?php echo $permission['permissionID']; ?>">

        <label>Role ID:</label>
        <input type="role_id" name="role_id"
               value="<?php echo $permission['clan_roleID']; ?>">
        <br>

        <label>Name:</label>
        <input type="input" name="permission"
               value="<?php echo $permission['permissions']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_permissions">View Permissions List</a></p>

</main>
<?php include '../view/footer.php'; ?>
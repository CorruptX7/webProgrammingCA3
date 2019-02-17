<?php include '../view/header.php'; ?>
<main>
    <h1>Add Member</h1>
    <form action="index.php" method="post" id="add_member_form">
        <input type="hidden" name="action" value="add_member">

        <label>Role:</label>
        <select name="role_id">
            <?php foreach ($roles as $role) : ?>
                <option value="<?php echo $role['clan_roleID']; ?>">
                    <?php echo $role['roleName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Name:</label>
        <input type="input" name="name">
        <br>

        <label>Townhall:</label>
        <input type="input" name="townhall">
        <br>

        <label>League:</label>
        <input type="input" name="league">
        <br>

        <label>Level:</label>
        <input type="input" name="level">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add member">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_members">View Member List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>
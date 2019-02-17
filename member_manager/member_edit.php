<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Member</h1>
    <form action="index.php" method="post" id="add_member_form">

        <input type="hidden" name="action" value="update_member">

        <input type="hidden" name="member_id"
               value="<?php echo $member['memberID']; ?>">

        <label>Role ID:</label>
        <input type="role_id" name="role_id"
               value="<?php echo $member['clan_roleID']; ?>">
        <br>

        <label>Name:</label>
        <input type="input" name="name"
               value="<?php echo $member['memberName']; ?>">
        <br>

        <label>Townhall:</label>
        <input type="input" name="townhall"
               value="<?php echo $member['memberTownhall']; ?>">
        <br>

        <label>League:</label>
        <input type="input" name="league"
               value="<?php echo $member['memberLeague']; ?>">
        <br>

        <label>Level:</label>
        <input type="input" name="level"
               value="<?php echo $member['memberLevel']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_members">View Member List</a></p>

</main>
<?php include '../view/footer.php'; ?>
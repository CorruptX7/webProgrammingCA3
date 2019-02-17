<?php

require('../model/database.php');
require('../model/member_db.php');
require('../model/role_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL)
{
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL)
    {
        $action = 'list_members';
    }
}

if ($action == 'list_members')
{
    // Get the current role ID
    $role_id = filter_input(INPUT_GET, 'role_id', FILTER_VALIDATE_INT);
    if ($role_id == NULL || $role_id == FALSE)
    {
        $role_id = 1;
    }

    // Get member and role data
    $role_name = get_role_name($role_id);
    $roles = get_roles();
    $members = get_members_by_role($role_id);

    // Display the member list
    include('member_list.php');
}
else if ($action == 'show_edit_form')
{
    $member_id = filter_input(INPUT_POST, 'member_id', FILTER_VALIDATE_INT);
    if ($member_id == NULL || $member_id == FALSE)
    {
        $error = "Missing or incorrect member id.";
        include('../errors/error.php');
    }
    else
    {
        $member = get_member($member_id);
        include('member_edit.php');
    }
}
else if ($action == 'update_member')
{
    $member_id = filter_input(INPUT_POST, 'member_id', FILTER_VALIDATE_INT);
    $role_id = filter_input(INPUT_POST, 'role_id', FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $townhall = filter_input(INPUT_POST, 'townhall', FILTER_VALIDATE_INT);
    $league = filter_input(INPUT_POST, 'league');
    $level = filter_input(INPUT_POST, 'level', FILTER_VALIDATE_INT);

    // Validate the inputs
    if ($member_id == NULL || $member_id == FALSE || $role_id == NULL ||
            $role_id == FALSE || $name == NULL || $townhall == NULL ||
            $league == NULL || $level == NULL)
    {
        $error = "Invalid member data. Check all fields and try again.";
        include('../errors/error.php');
    }
    else
    {
        update_member($member_id, $role_id, $name, $townhall, $league, $level);

        // Display the member List page for the current role
        header("Location: .?role_id=$role_id");
    }
}
else if ($action == 'delete_member')
{
    $member_id = filter_input(INPUT_POST, 'member_id', FILTER_VALIDATE_INT);
    $role_id = filter_input(INPUT_POST, 'role_id', FILTER_VALIDATE_INT);
    if ($role_id == NULL || $role_id == FALSE ||
            $member_id == NULL || $member_id == FALSE)
    {
        $error = "Missing or incorrect member id or role id.";
        include('../errors/error.php');
    }
    else
    {
        delete_member($member_id);
        header("Location: .?role_id=$role_id");
    }
}
else if ($action == 'show_add_form')
{
    $roles = get_roles();
    include('member_add.php');
}
else if ($action == 'add_member')
{
    $role_id = filter_input(INPUT_POST, 'role_id', FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $townhall = filter_input(INPUT_POST, 'townhall', FILTER_VALIDATE_INT);
    $league = filter_input(INPUT_POST, 'league');
    $level = filter_input(INPUT_POST, 'level', FILTER_VALIDATE_INT);
    if ($role_id == NULL || $role_id == FALSE || $name == NULL ||
            $townhall == NULL || $league == NULL || $level ==  NULL)
    {
        $error = "Invalid member data. Check all fields and try again.";
        include('../errors/error.php');
    }
    else
    {
        add_member($role_id, $name, $townhall, $league, $level);
        header("Location: .?role_id=$role_id");
    }
}
else if ($action == 'list_roles')
{
    $roles = get_roles();
    include('role_list.php');
}
else if ($action == 'add_role')
{
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL)
    {
        $error = "Invalid role name. Check name and try again.";
        include('../errors/error.php');
    }
    else
    {
        add_role($name);
        header('Location: .?action=list_roles');  // display the Role List page
    }
}
else if ($action == 'delete_role')
{
    $role_id = filter_input(INPUT_POST, 'role_id', FILTER_VALIDATE_INT);
    delete_role($role_id);
    header('Location: .?action=list_roles');      // display the Role List page
}
?>
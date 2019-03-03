<?php

require('../model/database.php');
require('../model/permission_db.php');
require('../model/role_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL)
{
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL)
    {
        $action = 'list_permissions';
    }
}

if ($action == 'list_permissions')
{
    // Get the current role ID
    $role_id = filter_input(INPUT_GET, 'role_id', FILTER_VALIDATE_INT);
    if ($role_id == NULL || $role_id == FALSE)
    {
        $role_id = 1;
    }

    // Get permission and role data
    $role_name = get_role_name($role_id);
    $roles = get_roles();
    $permissions = get_permissions_by_role($role_id);

    // Display the permission list
    include('permission_list.php');
}


else if ($action == 'show_edit_form')
{
    $permission_id = filter_input(INPUT_POST, 'permission_id', FILTER_VALIDATE_INT);
    if ($permission_id == NULL || $permission_id == FALSE)
    {
        $error = "Missing or incorrect permission id.";
        include('../errors/error.php');
    }
    else
    {
        $permission = get_permission($permission_id);
        include('permission_edit.php');
    }
}
else if ($action == 'update_permission')
{
    $permission_id = filter_input(INPUT_POST, 'permission_id', FILTER_VALIDATE_INT);
    $role_id = filter_input(INPUT_POST, 'role_id', FILTER_VALIDATE_INT);
    $permissions = filter_input(INPUT_POST, 'permission');

    // Validate the inputs
    if ($permission_id == NULL || $permission_id == FALSE || $role_id == NULL ||
            $role_id == FALSE || $permissions == NULL)
    {
        $error = "Invalid member data. Check all fields and try again.";
        include('../errors/error.php');
    }
    else
    {
        update_permission($permission_id, $role_id, $permissions);

        // Display the permission List page for the current role
        header("Location: .?role_id=$role_id");
    }
}


else if ($action == 'delete_permission')
{
    $permission_id = filter_input(INPUT_POST, 'permission_id', FILTER_VALIDATE_INT);
    $role_id = filter_input(INPUT_POST, 'role_id', FILTER_VALIDATE_INT);
    if ($role_id == NULL || $role_id == FALSE ||
            $permission_id == NULL || $permission_id == FALSE)
    {
        $error = "Missing or incorrect permission id or role id.";
        include('../errors/error.php');
    }
    else
    {
        delete_permission($permission_id);
        header("Location: .?role_id=$role_id");
    }
}


else if ($action == 'show_add_form')
{
    $roles = get_roles();
    include('permission_add.php');
}
else if ($action == 'add_permission')
{
    $role_id = filter_input(INPUT_POST, 'role_id', FILTER_VALIDATE_INT);
    $permissions = filter_input(INPUT_POST, 'permission');
     if ($role_id == NULL || $role_id == FALSE || $permissions == NULL)
    {
        $error = "Invalid permission data. Check all fields and try again.";
        include('../errors/error.php');
    }
    else
    {
        add_permission($role_id, $permissions);
        header("Location: .?role_id=$role_id");
    }
}













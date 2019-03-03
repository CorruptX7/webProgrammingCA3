<?php

require('../model/database.php');
//require('../model/member_db.php');
require('../model/army_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL)
{
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL)
    {
        $action = 'list_armies';
    }
}

if ($action == 'list_armies')
{
    // Get the current role ID
    $army_id = filter_input(INPUT_GET, 'army_id', FILTER_VALIDATE_INT);
    if ($army_id == NULL || $army_id == FALSE)
    {
        $army_id = 1;
    }

    // Get member and role data
    $army_name = get_army_name($army_id);
    $armies = get_armies();
    //$members = get_members_by_role($army_id);
    // Display the member list
    include('army_list.php');
}
else if ($action == 'list_army')
{
    $armies = get_armies();
    include('army_add.php');
}
else if ($action == 'add_army')
{
    $name = filter_input(INPUT_POST, 'name');
    $desc = filter_input(INPUT_POST, 'desc');
    $rating = filter_input(INPUT_POST, 'rating', FILTER_VALIDATE_INT);

    // Validate inputs
    if ($name == NULL)
    {
        $error = "Invalid role name. Check name and try again.";
        include('../errors/error.php');
    }
    else if ($rating == NULL)
    {
        $error = "Invalid role name. Check name and try again.";
        include('../errors/error.php');
    }
    else if ($desc == NULL)
    {
        $error = "Invalid role name. Check name and try again.";
        include('../errors/error.php');
    }
    else
    {
        add_army($name, $rating, $desc);
        header('Location: .?action=list_army');  // display the Role List page
    }
}
else if ($action == 'delete_army')
{
    $army_id = filter_input(INPUT_POST, 'army_id', FILTER_VALIDATE_INT);
    delete_army($army_id);
    header('Location: .?action=list_army');      // display the Role List page
}







//else if ($action == 'delete_member')
//{
//    $member_id = filter_input(INPUT_POST, 'member_id', FILTER_VALIDATE_INT);
//    $role_id = filter_input(INPUT_POST, 'role_id', FILTER_VALIDATE_INT);
//    if ($role_id == NULL || $role_id == FALSE ||
//            $member_id == NULL || $member_id == FALSE)
//    {
//        $error = "Missing or incorrect member id or role id.";
//        include('../errors/error.php');
//    }
//    else
//    {
//        delete_member($member_id);
//        header("Location: .?role_id=$role_id");
//    }
//}
//else if ($action == 'show_add_form')
//{
//    $roles = get_roles();
//    include('member_add.php');
//}
//else if ($action == 'add_member')
//{
//    $role_id = filter_input(INPUT_POST, 'role_id', FILTER_VALIDATE_INT);
//    $name = filter_input(INPUT_POST, 'name');
//    $townhall = filter_input(INPUT_POST, 'townhall', FILTER_VALIDATE_INT);
//    $league = filter_input(INPUT_POST, 'league');
//    $level = filter_input(INPUT_POST, 'level', FILTER_VALIDATE_INT);
//    if ($role_id == NULL || $role_id == FALSE || $name == NULL ||
//            $townhall == NULL || $league == NULL || $level ==  NULL)
//    {
//        $error = "Invalid member data. Check all fields and try again.";
//        include('../errors/error.php');
//    }
//    else
//    {
//        add_member($role_id, $name, $townhall, $league, $level);
//        header("Location: .?role_id=$role_id");
//    }
//}
?>
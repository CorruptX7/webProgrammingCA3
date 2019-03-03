<?php

function get_permissions()
{
    global $db;
    $query = 'SELECT * FROM permissions
              ORDER BY permissionID';
    $statement = $db->prepare($query);
    $statement->execute();
    $permissions = $statement->fetchAll();
    $statement->closeCursor();
    return $permissions;
}

function get_permissions_by_role($role_id)
{
    global $db;
    $query = 'SELECT * FROM permissions 
              WHERE permissions.clan_roleID = :role_id
              ORDER BY permissionID';
    $statement = $db->prepare($query);
    $statement->bindValue(":role_id", $role_id);
    $statement->execute();
    $permissions = $statement->fetchAll();
    $statement->closeCursor();
    return $permissions;
}

function get_permission($permission_id)
{
    global $db;
    $query = 'SELECT * FROM permissions
              WHERE permissionID = :permission_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":permission_id", $permission_id);
    $statement->execute();
    $permissions = $statement->fetch();
    $statement->closeCursor();
    return $permissions;
}

function delete_permission($permission_id)
{
    global $db;
    $query = 'DELETE FROM permissions
              WHERE permissionID = :permission_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':permission_id', $permission_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_permission($role_id, $permissions)
{
    global $db;
    $query = 'INSERT INTO permissions
                 (clan_roleID, permissions)
              VALUES
                 (:role_id, :permission)';
    $statement = $db->prepare($query);
    $statement->bindValue(':role_id', $role_id);
    $statement->bindValue(':permission', $permissions);
    $statement->execute();
    $statement->closeCursor();
}

function update_permission($permission_id, $role_id, $permission)
{
    global $db;
    $query = 'UPDATE permissions
              SET clan_roleID = :role_id,
                  permissions = :permission
               WHERE permissionID = :permission_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':role_id', $role_id);
    $statement->bindValue(':permission', $permission);
    $statement->bindValue(':permission_id', $permission_id);
    $statement->execute();
    $statement->closeCursor();
}

<?php
function get_roles() {
    global $db;
    $query = 'SELECT * FROM clan_roles
              ORDER BY clan_roleID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_role_name($role_id) {
    global $db;
    $query = 'SELECT * FROM clan_roles
              WHERE clan_roleID = :role_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':role_id', $role_id);
    $statement->execute();    
    $role = $statement->fetch();
    $statement->closeCursor();    
    $role_name = $role['roleName'];
    return $role_name;
}

function add_role($name) {
    global $db;
    $query = 'INSERT INTO clan_roles (roleName)
              VALUES (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_role($role_id) {
    global $db;
    $query = 'DELETE FROM clan_roles
              WHERE clan_roleID = :role_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':role_id', $role_id);
    $statement->execute();
    $statement->closeCursor();
}
?>
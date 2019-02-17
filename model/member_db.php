<?php
function get_members() {
    global $db;
    $query = 'SELECT * FROM members
              ORDER BY memberID';
    $statement = $db->prepare($query);
    $statement->execute();
    $members = $statement->fetchAll();
    $statement->closeCursor();
    return $members;
}

function get_members_by_role($role_id) {
    global $db;
    $query = 'SELECT * FROM members
              WHERE members.clan_roleID = :role_id
              ORDER BY memberID';
    $statement = $db->prepare($query);
    $statement->bindValue(":role_id", $role_id);
    $statement->execute();
    $members = $statement->fetchAll();
    $statement->closeCursor();
    return $members;
}

function get_member($member_id) {
    global $db;
    $query = 'SELECT * FROM members
              WHERE memberID = :member_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":member_id", $member_id);
    $statement->execute();
    $member = $statement->fetch();
    $statement->closeCursor();
    return $member;
}

function delete_member($member_id) {
    global $db;
    $query = 'DELETE FROM members
              WHERE memberID = :member_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':member_id', $member_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_member($role_id, $name, $townhall, $league, $level) {
    global $db;
    $query = 'INSERT INTO members
                 (clan_roleID, memberName, memberTownhall, memberLeague, memberLevel)
              VALUES
                 (:role_id, :name, :townhall, :league, :level)';
    $statement = $db->prepare($query);
    $statement->bindValue(':role_id', $role_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':townhall', $townhall);
    $statement->bindValue(':league', $league);
    $statement->bindValue(':level', $level);
    $statement->execute();
    $statement->closeCursor();
}

function update_member($member_id, $role_id, $name, $townhall, $league, $level) {
    global $db;
    $query = 'UPDATE members
              SET clan_roleID = :role_id,
                  memberName = :name,
                  memberTownhall = :townhall,
                  memberLeague = :league,
                  memberLevel = :level
               WHERE memberID = :member_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':role_id', $role_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':townhall', $townhall);
    $statement->bindValue(':league', $league);
    $statement->bindValue(':level', $level);
    $statement->bindValue(':member_id', $member_id);
    $statement->execute();
    $statement->closeCursor();
}
?>
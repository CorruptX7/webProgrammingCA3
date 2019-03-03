<?php

function get_armies()
{
    global $db;
    $query = 'SELECT * FROM armies
              ORDER BY armyID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}

function get_army_name($army_id)
{
    global $db;
    $query = 'SELECT * FROM armies
              WHERE armyID = :army_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':army_id', $army_id);
    $statement->execute();
    $army = $statement->fetch();
    $statement->closeCursor();
    $army_name = $army['armyName'];
    return $army_name;
}

function add_army($name, $rating, $desc)
{
    global $db;
    $query = 'INSERT INTO armies
                 (armyName, armyRating, armyDesc)
              VALUES
                 (:name, :rating, :desc)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':desc', $desc);
    $statement->bindValue(':rating', $rating);
    $statement->execute();
    $statement->closeCursor();
}

function delete_army($army_id)
{
    global $db;
    $query = 'DELETE FROM armies
              WHERE armyID = :army_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':army_id', $army_id);
    $statement->execute();
    $statement->closeCursor();
}

function update_army($army_id, $name)
{
    global $db;
    $query = 'UPDATE armies
              SET armyID = :army_id,
                  armyName = :name,
               WHERE armyID = :army_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':army_id', $army_id);
    $statement->execute();
    $statement->closeCursor();
}

?>
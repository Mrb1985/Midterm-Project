<?php
function get_types()
{
    global $db;
    $query = 'SELECT * FROM types ORDER BY typeID';
    $statement = $db->prepare($query);
    $statement->execute();
    $type = $statement->fetchAll();
    $statement->closeCursor();
    return $type;
}

function get_type_name($type_id)
{
    if (!$type_id) {
        return "All Types";
    }
    global $db;
    $query = 'SELECT * FROM types WHERE typeID = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $type = $statement->fetch();
    $statement->closeCursor();
    $type_name = $class['typeName'];
    return $type_name;
}

function delete_type($type_id)
{
    global $db;
    $query = 'DELETE FROM types where typeID = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_type($type_name)
{
    global $db;
    $query = 'INSERT INTO types ( typeName ) VALUES (:type_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_name', $type_name);
    $statement->execute();
    $statement->closeCursor();
}

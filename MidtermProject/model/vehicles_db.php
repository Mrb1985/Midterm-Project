<?php

function get_vehicles()
{
    global $db;
    $query = 'SELECT `year`, `model`, `price`, `typeID`, `makeID`, `classID`, `vehicleID` FROM `vehicles` WHERE 1 ORDER BY price DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicle = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicle;
}


function get_vehicles_by_class($class_id)
{
    global $db;
    if ($class_id) {
        $query = 'SELECT V.vehicleID, C.className From vehicles V
            LEFT JOIN classes C ON V.classID = C.classID
                WHERE V.classID = :classID ORDER BY V.vehicleID';
    } else {
        $query = 'SELECT V.vehicleID, C.className From vehicles V
        LEFT JOIN classes C ON V.classID = C.classID ORDER BY C.classID';
    }
    $statement = $db->prepare($query);
    if ($class_id) {
        $statement->bindValue(':classID', $class_id);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicle_name($vehicle_id)
{
    if (!$vehicle_id) {
        return "all Vehicles";
    }
    global $db;
    $query = 'SELECT * FROM vehicles WHERE vehicleID = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $vehicle = $statement->fetch();
    $statement->closeCursor();
    $vehicle_name = $vehicle['model'];
    return $vehicle_name;
}

function delete_vehicle($vehicle_id)
{
    global $db;
    $query = 'DELETE FROM vehicles where vehicleID = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_vehicle($year1, $vehicle_name, $price1, $type_id, $make_id, $class_id)
{
    global $db;
    $query = 'INSERT INTO vehicles ( year, model, price, typeID, makeID, classID ) VALUES (:year1, :vehicle_name, :price1, :type_id, :make_id, :class_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_name', $vehicle_name);
    $statement->bindValue(':year1', $year1);
    $statement->bindValue(':price1', $price1);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}

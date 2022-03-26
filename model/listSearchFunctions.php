<?php 

require_once("database.php");

function listMakes() {
    global $db;
    $query = 'SELECT * FROM makes';
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function listTypes() {
    global $db;
    $query = 'SELECT * FROM types';
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function listClasses() {
    global $db;
    $query = 'SELECT * FROM classes';
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function listCars($make, $type, $class, $sort) {
    global $db;
    $query = 'SELECT vehicles.year, vehicles.model, vehicles.price, 
        vehicles.type_id, vehicles.make_id, vehicles.class_id,
        types.type, makes.make, classes.class, vehicles.id
        FROM vehicles
        INNER JOIN types ON types.ID = vehicles.type_id
        INNER JOIN makes ON makes.ID = vehicles.make_id
        INNER JOIN classes ON classes.ID = vehicles.class_id';
    $counter = 0;
    if ($make) {
        $counter += 1;
        $query = $query . ' WHERE make_id = ' . $make;
    }
    if ($type) {
        if ($counter == 0) {
            $query = $query . ' WHERE';
        }
        else {
            $query = $query . ' AND';
        }
        $counter += 1;
        $query = $query . ' type_id = ' . $type;
    }
    if ($class) {
        if ($counter == 0) {
            $query = $query . ' WHERE';
        }
        else {
            $query = $query . ' AND';
        }
        $counter += 1;
        $query = $query . ' class_id = ' . $class;
    }
    if ($sort == 'price') {
        $query = $query . " ORDER BY price DESC";
    }
    else {
        $query = $query . " ORDER BY year DESC";
    }
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

?>
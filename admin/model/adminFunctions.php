<?php 

require_once("database.php");

function deleteCar($id) {
    global $db;
    $query = 'DELETE FROM vehicles WHERE id = ' . $id;
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}

function addCar($year, $make, $model, $type, $class, $price) {
    global $db;
    $query = 'INSERT INTO vehicles (year, model, price, type_id, class_id, make_id)
                VALUES (:year, :model, :price, :type_id, :class_id, :make_id);';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':type_id', $type);
    $statement->bindValue(':class_id', $class);
    $statement->bindValue(':make_id', $make);
    $statement->execute();
    $statement->closeCursor();
}

function addType($name) {
    global $db;
    $query = 'INSERT INTO types (type) VALUES (:type);';
    $statement = $db->prepare($query);
    $statement->bindValue(':type', $name);
    $statement->execute();
    $statement->closeCursor();
}

function deleteType($id) {
    global $db;
    $query = 'DELETE FROM vehicles WHERE type_id = ' . $id;
    $statement = $db->prepare($query);
    $statement->execute();
    $query = 'DELETE FROM types WHERE ID = ' . $id;
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}

function addMake($name) {
    global $db;
    $query = 'INSERT INTO makes (make) VALUES (:make);';
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $name);
    $statement->execute();
    $statement->closeCursor();
}

function deleteMake($id) {
    global $db;
    $query = 'DELETE FROM vehicles WHERE make_id = ' . $id;
    $statement = $db->prepare($query);
    $statement->execute();
    $query = 'DELETE FROM makes WHERE ID = ' . $id;
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}

function addClass($name) {
    global $db;
    $query = 'INSERT INTO classes (class) VALUES (:class);';
    $statement = $db->prepare($query);
    $statement->bindValue(':class', $name);
    $statement->execute();
    $statement->closeCursor();
}

function deleteClass($id) {
    global $db;
    $query = 'DELETE FROM vehicles WHERE class_id = ' . $id;
    $statement = $db->prepare($query);
    $statement->execute();
    $query = 'DELETE FROM classes WHERE ID = ' . $id;
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}

?>
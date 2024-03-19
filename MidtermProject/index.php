<?php
require_once('model/database.php');
require_once('model/classes_db.php');
require_once('model/makes_db.php');
require_once('model/types_db.php');
require_once('model/vehicles_db.php');


$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
$class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_SPECIAL_CHARS);
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
$type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_SPECIAL_CHARS);
$make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_SPECIAL_CHARS);
$class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_SPECIAL_CHARS);
$vehicle_name = filter_input(INPUT_POST, 'vehicle_name', FILTER_SANITIZE_SPECIAL_CHARS);
$year1 = filter_input(INPUT_POST, 'year1', FILTER_VALIDATE_INT);
$price1 = filter_input(INPUT_POST, 'price1', FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_vehicles';

$vehicles = get_vehicles($year1, $vehicle_id, $price1);
include('view/vehicles_list.php');

        

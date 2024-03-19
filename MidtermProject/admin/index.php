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

switch ($action) {
    case "list_classes":
        $classes = get_classes();
        include('view/classes_list.php');
        break; 
    case "add_class":
        if (!empty($class_name)) {
            add_class($class_name);
            header("Location: .?action=list_classes");
            exit(); 
        } else {
            $error = "Invalid class name. Please try again.";
            include("view/error.php");
            exit(); 
        }
        break; 
        case "list_makes":
            $makes = get_makes();
            include('view/makes_list.php');
            break; 
        case "add_make":
            if (!empty($make_name)) {
                add_make($make_name);
                header("Location: .?action=list_makes");
                exit(); 
            } else {
                $error = "Invalid make name. Please check the field and try again.";
                include("view/error.php");
                exit(); 
            }
            
        break; 
        case "list_types":
            $types = get_types();
            include('view/types_list.php');
            break;  
        case "add_type":
            if (!empty($type_name)) {
                add_type($type_name);
                header("Location: .?action=list_types");
                exit(); 
            } else {
                $error = "Invalid type name. Please check the field and try again.";
                include("view/error.php");
                exit(); 
            }
            
        break; 
        case "add_vehicle":
            if (!empty($vehicle_name)) {
                add_vehicle($year1, $vehicle_name, $price1, $type_id, $make_id, $class_id );
                header("Location: .?action=list_vehicles");
                exit(); 
            } else {
                $error = "Invalid type name. Please check the field and try again.";
                include("view/error.php");
                exit(); 
            }
            
        break; 
    case "delete_class":
        if ($class_id) {
            try {
                delete_class($class_id);
                header("Location: .?action=list_classes");
                exit(); 
            } catch (PDOException $e) {
                $error = "You cannot delete a class.";
                include('view/error.php');
                exit(); 
            }
        }
        break; 
    case "delete_make":
        if ($make_id) {
            delete_make($make_id);
            header("Location: .?action=list_makes&make_id=" . $make_id);
            exit(); 
        } else {
            $error = "Missing or incorrect make id.";
            include('view/error.php');
            exit(); 
        }
        break; 
    case "delete_type":
            if ($type_id) {
                delete_type($type_id);
                header("Location: .?action=list_types&type_id=" . $type_id);
                exit(); 
            } else {
                $error = "Missing or incorrect type id.";
                include('view/error.php');
                exit(); 
            }
            break; 
    case "delete_vehicle":
            if ($vehicle_id) {
                delete_vehicle($vehicle_id);
                header("Location: .?action=list_vehicles&vehicle_id=" . $vehicle_id);
                 exit(); 
            } else {
                $error = "Missing or incorrect vehicle id.";
                include('view/error.php');
                exit(); 
            }
            break; 
    default:
        
        
        
        $vehicles = get_vehicles($vehicle_id);
        include('view/vehicles_list.php');
}
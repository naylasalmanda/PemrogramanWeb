<?php
require_once 'database.php';
require_once 'controller.php';

$controller = new BookController($conn);

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if ($action == 'create') {
    $controller->create();
} elseif ($action == 'edit' && $id) {
    $controller->edit($id);
} elseif ($action == 'delete' && $id) {
    $controller->delete($id);
} else {
    $controller->index();
}

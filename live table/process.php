<?php

$errors = [];
$data = [];
$department = $_POST['department'];

if (empty($_POST['name'])) {
    $errors['name'] = 'Name is required.';
}

if (empty($_POST['email'])) {
    $errors['email'] = 'Email is required.';
}

if (empty($_POST['department'])) {
    $errors['department'] = 'Department is required.';
}

if (empty($_POST['position'])) {
    $errors['position'] = 'Position is required.';
}

if (empty($_POST['img'])) {
    $errors['img'] = 'Img is required.';
}
if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['department'] = $_POST['department'];
    $data['position'] = $_POST['position'];
    $data['img'] = $_POST['img'];
}

echo json_encode($data);

<?php
    
$data = new StdClass();
$data->lastname = '';
$data->firstname = '';
$data->age = '';
$action = 'Page1';

if (isset($_POST['data'])) {
    $data = json_decode($_POST['data']);
}
if (isset($_POST['lastname'])) {
    $data->lastname = $_POST['lastname'];
}
if (isset($_POST['firstname'])) {
    $data->firstname = $_POST['firstname'];
}
if (isset($_POST['age'])) {
    $data->age = $_POST['age'];
}
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

if ($action == 'Page1') {
		include 'page1.php';
} else if ($action == 'Page2') {
		if(empty($data->lastname) || empty($data->firstname)) {
			echo "Last name and firstname cannot be blank";
			include 'page1.php';
		} else {
			include 'page2.php';
		}
} else  if ($action == 'Page3') {
		if(filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT ) == FALSE) {
			echo "Age must be an integer";
			include 'page2.php';
		} else {
			include 'page3.php';
		}
} else  if ($action == 'Finish') {
    $data->firstname = '';
    $data->lastname = '';
		$data->age = '';
    include 'page1.php';
}

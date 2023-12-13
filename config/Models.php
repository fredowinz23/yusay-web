<?php
include "CRUD.php";
include "functions.php";

function account() {
	$crud = new CRUD;
	$crud->table = "account";
	return $crud;
}

function beneficiary() {
	$crud = new CRUD;
	$crud->table = "beneficiary";
	return $crud;
}

function volunteer() {
	$crud = new CRUD;
	$crud->table = "volunteer";
	return $crud;
}

function category() {
	$crud = new CRUD;
	$crud->table = "category";
	return $crud;
}

function program() {
	$crud = new CRUD;
	$crud->table = "program";
	return $crud;
}

function donation() {
	$crud = new CRUD;
	$crud->table = "donation";
	return $crud;
}

function joiner() {
	$crud = new CRUD;
	$crud->table = "joiner";
	return $crud;
}


function address() {
	$crud = new CRUD;
	$crud->table = "address";
	return $crud;
}



?>

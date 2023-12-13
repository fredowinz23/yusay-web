<?php
session_start();
require_once '../config/database.php';
require_once '../config/Models.php';

$action = $_GET['action'];

switch ($action) {

	case 'account-save' :
		account_save();
		break;

	case 'reset-password' :
		reset_password();
		break;

	case 'beneficiary-submit' :
		beneficiary_submit();
		break;

	case 'volunteer-submit' :
		volunteer_submit();
		break;

	case 'donation-submit' :
		donation_submit();
		break;

	case 'donation-by-staff-submit' :
		donation_by_staff_submit();
		break;

	case 'beneficiary-save' :
		beneficiary_save();
		break;

	case 'change-beneficiary-status' :
		change_beneficiary_status();
		break;

	case 'change-program-status' :
		change_program_status();
		break;

	case 'change-volunteer-status' :
		change_volunteer_status();
		break;

	case 'change-donation-status' :
		change_donation_status();
		break;

	case 'mission-save' :
		mission_save();
		break;

	case 'joiner-add' :
		joiner_add();
		break;

	case 'joiner-delete' :
		joiner_delete();
		break;

	case 'category-save' :
		category_save();
		break;

	case 'category-delete' :
		category_delete();
		break;

	case 'program-save' :
		program_save();
		break;

	case 'address-save' :
		address_save();
		break;

	case 'address-delete' :
		address_delete();
		break;

	default :
}

function reset_password(){
	$Id = $_GET["accountId"];
	$role = $_GET["role"];

	$six_digit_random_number = random_int(100000, 999999);

	$model = account();
	$model->obj["status"] = "Inactive";
	$model->obj["password"] = md5($six_digit_random_number);
	$model->obj["tempPassword"] = $six_digit_random_number;
	$model->update("Id=$Id");

	header("Location: accounts.php?role=" . $role . "&success=You have reset the password");
}

function volunteer_submit(){

	$model = volunteer();
	$model->obj = $_POST;
	if (isset($_POST["reason1"])) {
		$model->obj["reason1"] = 1 ;
	}
	if (isset($_POST["reason2"])) {
		$model->obj["reason2"] = 1 ;
	}
	if (isset($_POST["reason3"])) {
		$model->obj["reason3"] = 1 ;
	}
	if (isset($_POST["reason4"])) {
		$model->obj["reason4"] = 1 ;
	}
	if (isset($_POST["reason5"])) {
		$model->obj["reason5"] = 1 ;
	}
	if (isset($_POST["reason6"])) {
		$model->obj["reason6"] = 1 ;
	}

	$model->create();


	header('Location: success-message.php?success=You have successfully sent your form');

}



function category_save(){
	#Process to save to the database

	$model = category();
	$model->obj["name"] = $_POST["name"];
	$model->obj["description"] = $_POST["description"];

	if ($_POST["form-type"] == "add") {
		$model->create();
	}

	if ($_POST["form-type"] == "edit") {
		$Id = $_POST["Id"];
		$model->update("Id=$Id");
	}

	header('Location: categories.php');
}

function category_delete(){
	#Process to save to the database

	$Id = $_GET["Id"];
	$model = category();
	$model->delete("Id=$Id");

	header('Location: categories.php');
}


function address_save(){
	#Process to save to the database

	$model = address();
	$model->obj["name"] = $_POST["name"];
	$model->obj["type"] = $_POST["type"];
	$model->obj["refId"] = $_POST["refId"];

	if ($_POST["type"]=="City") {
		$model->obj["postalCode"] = $_POST["postalCode"];
	}

	$model->create();


	if ($_POST["type"]=="City") {

			header('Location: addresses.php');
	}
	else{

			header('Location: addresses.php?type=' . $_POST["type"] . '&refId=' . $_POST["refId"]);
	}

}

function address_delete(){
	#Process to save to the database

	$Id = $_GET["Id"];
	$model = address();
	$model->delete("Id=$Id");


	if ($_GET["type"]=="City") {
			header('Location: addresses.php');
	}
	else{
			header('Location: addresses.php?type=' . $_GET["type"] . '&refId=' . $_GET["refId"]);
	}

}

function program_save(){
	#Process to save to the database

	$image_file_name = uploadFile($_FILES["image"]);
	$model = program();
	$model->obj["title"] = $_POST["title"];
	$model->obj["description"] = $_POST["description"];
	$model->obj["categoryId"] = $_POST["categoryId"];
	$model->obj["date"] = $_POST["date"];
	$model->obj["notes"] = $_POST["notes"];
	$model->obj["maxVolunteer"] = $_POST["maxVolunteer"];
	$model->obj["address"] = $_POST["address"];
	$model->obj["time"] = $_POST["time"];
	$model->obj["amountSpent"] = $_POST["amountSpent"];

	if ($_POST["form-type"] == "add") {
		$model->obj["image"] = $image_file_name;
		$model->create();
	}

	if ($_POST["form-type"] == "edit") {
		if ($image_file_name!=0) {
			$model->obj["image"] = $image_file_name;
		}
		$Id = $_POST["Id"];
		$model->update("Id=$Id");
	}

	// print_r($model->obj);
	header('Location: programs.php?catId=' . $_POST["categoryId"]);
}


function beneficiary_submit(){
	#save records to database
	$model = beneficiary();
	$model->obj["firstName"] = $_POST["firstName"];
	$model->obj["lastName"] = $_POST["lastName"];
	$model->obj["email"] = $_POST["email"];
	$model->obj["age"] = $_POST["age"];
	$model->obj["gender"] = $_POST["gender"];
	$model->obj["contactNumber"] = $_POST["contactNumber"];
	$model->obj["address"] = $_POST["address"];
	$model->obj["barangay"] = $_POST["barangay"];
	$model->obj["city"] = $_POST["city"];
	$model->obj["content"] = $_POST["content"];
	$model->obj["status"] = "Pending";
	$model->obj["proof"] = uploadFile($_FILES["image"]);
	$model->obj["dateAdded"] = "NOW()";
	$model->create();

		header('Location: success-message.php?success=You have successfully sent your form');

}

function donation_submit(){
	#save records to database
	$model = donation();
	$model->obj["firstName"] = $_POST["firstName"];
	$model->obj["lastName"] = $_POST["lastName"];
	$model->obj["email"] = $_POST["email"];
	$model->obj["age"] = $_POST["age"];
	$model->obj["gender"] = $_POST["gender"];
	$model->obj["contactNumber"] = $_POST["contactNumber"];
	$model->obj["address"] = $_POST["address"];
	$model->obj["barangay"] = $_POST["barangay"];
	$model->obj["city"] = $_POST["city"];
	$model->obj["content"] = $_POST["content"];
	$model->obj["status"] = "Pending";
	$model->obj["proof"] = uploadFile($_FILES["image"]);
	$model->obj["isAnonymous"] = $_POST["isAnonymous"];
	$model->obj["amount"] = $_POST["amount"];
	$model->obj["dateAdded"] = "NOW()";
	$model->create();

	header('Location: success-message.php');

}


function donation_by_staff_submit(){
	#save records to database
	$model = donation();
	$model->obj["firstName"] = $_POST["firstName"];
	$model->obj["lastName"] = $_POST["lastName"];
	$model->obj["email"] = $_POST["email"];
	$model->obj["age"] = $_POST["age"];
	$model->obj["gender"] = $_POST["gender"];
	$model->obj["contactNumber"] = $_POST["contactNumber"];
	$model->obj["address"] = $_POST["address"];
	$model->obj["barangay"] = $_POST["barangay"];
	$model->obj["city"] = $_POST["city"];
	$model->obj["content"] = $_POST["content"];
	$model->obj["amount"] = $_POST["amount"];
	$model->obj["status"] = "Pending";
	$model->obj["isAnonymous"] = $_POST["isAnonymous"];
	$model->obj["dateAdded"] = "NOW()";
	$model->create();

	header('Location: donations.php');

}


function change_beneficiary_status(){
	#save records to database

	$status = $_GET["status"];
	$Id = $_GET["Id"];

	$model = beneficiary();
	$model->obj["status"] = $status;
	$model->update("Id=$Id");

	if ($status=="Approved") {
		$statusMessage = "You have successfully approved this record";
	}
	else{
		$statusMessage = "You have successfully denied this record";
	}

	header('Location: beneficiaries.php?success=' . $statusMessage);
}

function change_program_status(){
	#save records to database

	$status = $_GET["status"];
	$Id = $_GET["Id"];

	$model = program();
	$model->obj["status"] = $status;
	$model->update("Id=$Id");

	if ($status=="Approved") {
		$statusMessage = "You have successfully approved this program";
	}
	else{
		$statusMessage = "You have successfully denied this program";
	}

	header('Location: program-detail.php?Id='.$Id.'&success=' . $statusMessage);
}


function change_volunteer_status(){
	#save records to database

	$status = $_GET["status"];
	$Id = $_GET["Id"];

	$model = volunteer();
	$model->obj["status"] = $status;
	$model->update("Id=$Id");

	if ($status=="Approved") {
		$statusMessage = "You have successfully approved this record";
	}
	if ($status=="Denied") {
		$statusMessage = "You have successfully denied this record";
	}
	if ($status=="Pending") {
		$statusMessage = "You have successfully reset this record";
	}

	header('Location: volunteers.php?success=' . $statusMessage);
}


function change_donation_status(){
	#save records to database

	$status = $_GET["status"];
	$Id = $_GET["Id"];

	$model = donation();
	$model->obj["status"] = $status;
	$model->update("Id=$Id");

	if ($status=="Approved") {
		$statusMessage = "You have successfully approved this record";
	}
	else{
		$statusMessage = "You have successfully denied this record";
	}

	header('Location: donations.php?success=' . $statusMessage);

}


function user_add(){

	$username = $_POST["username"];
	$checkUser = user()->count("username='$username'");

	if ($checkUser>=1) {
		header('Location: user-add.php?role='.$_POST["role"].'&error=Username Already Exists');
	}
	else{
			$model = user();
			$model->obj["username"] = $_POST["username"];
			$model->obj["firstName"] = $_POST["firstName"];
			$model->obj["role"] = $_POST["role"];
			$model->obj["phone"] = $_POST["phone"];
			$model->obj["email"] = $_POST["email"];
			$model->obj["lastName"] = $_POST["lastName"];
			$model->obj["password"] = $_POST["password"];
			$model->obj["departmentId"] = $_POST["departmentId"];
			$model->obj["dateAdded"] = "NOW()";
			$model->create();
			header('Location: accounts.php?role=' . $_POST["role"]);
	}
}

function account_save(){
	#Process to save to the database

	$model = account();
	$model->obj["username"] = $_POST["username"];
	$model->obj["firstName"] = $_POST["firstName"];
	$model->obj["lastName"] = $_POST["lastName"];
	$model->obj["role"] = $_POST["role"];

	if ($_POST["role"]=="Volunteer") {
		$model->obj["volunteerId"] = $_POST["volunteerId"];
	}

	if ($_POST["form-type"] == "add") {
		$model->obj["password"] = md5($_POST["password"]);
		$model->obj["tempPassword"] = $_POST["password"];
		$model->create();
	}

	if ($_POST["form-type"] == "edit") {
		$Id = $_POST["Id"];
		$model->update("Id=$Id");
	}

	header('Location: accounts.php?role=' . $_POST["role"]);
}

function joiner_add(){
	#Process to save to the database

	$model = joiner();
	$model->obj["missionId"] = $_POST["missionId"];
	$model->obj["userId"] = $_POST["userId"];

	$model->create();

	header('Location: mission-joiners.php?missionId=' . $_POST["missionId"]);
}

function department_delete(){
	#Process to save to the database

	$Id = $_GET["Id"];
	department()->delete("Id=$Id");

	header('Location: department.php');
}



function beneficiary_save(){
	#Process to save to the database

	$model = beneficiary();
	$model->obj["name"] = $_POST["name"];
	$model->obj["description"] = $_POST["description"];

	if ($_POST["form-type"] == "add") {
		$model->create();
	}

	if ($_POST["form-type"] == "edit") {
		$Id = $_POST["Id"];
		$model->update("Id=$Id");
	}

	header('Location: beneficiaries.php');
}


function mission_save(){
	#Process to save to the database

	$model = mission();
	$model->obj["name"] = $_POST["name"];
	$model->obj["description"] = $_POST["description"];
	$model->obj["date"] = $_POST["date"];

	if ($_POST["form-type"] == "add") {
		$model->create();
	}

	if ($_POST["form-type"] == "edit") {
		$Id = $_POST["Id"];
		$model->update("Id=$Id");
	}

	header('Location: missions.php');
}


function joiner_delete(){
	#Process to save to the database

	$Id = $_GET["Id"];
	joiner()->delete("Id=$Id");

	header('Location: mission-joiners.php?missionId=' . $_GET["missionId"]);
}

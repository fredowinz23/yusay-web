<?php
session_start();
require_once '../config/database.php';
require_once '../config/Models.php';

$action = $_GET['action'];

switch ($action) {

	case 'user-login' :
		user_login();
		break;

	case 'user-logout' :
		user_logout();
		break;

	case 'change-password' :
		change_password();
		break;

	case 'register-step-1' :
		register_step_1();
		break;

	case 'register-step-2' :
		register_step_2();
		break;

	default :
}

function user_login(){
		//$username = mysqli_real_escape_string($connection, $_POST["username"]);
		$username = $_POST["username"];
		$password = md5($_POST["password"]);

		$countUser = account()->count("username='$username' and password='$password'");
		if ($countUser==0):
			header('Location: login.php?error=User does not exist');
		else:
			$user = account()->get("username='$username'");
			$_SESSION["user_session"] = array();
			$_SESSION["user_session"]["Id"] = $user->Id;
			$_SESSION["user_session"]["username"] = $user->username;
			$_SESSION["user_session"]["firstName"] = $user->firstName;
			$_SESSION["user_session"]["lastName"] = $user->lastName;
			$_SESSION["user_session"]["role"] = $user->role;

			if ($user->status=="Inactive") {
				header('Location: ../auth/change-password.php');
			}
			else{
					header('Location: ../pages/');
			}
		endif;
}

function register_step_1()
{
	$username = $_POST["username"];
	$password1 = $_POST["password1"];

	$countUser = user()->count("username='$username'");
	if ($countUser>0):
		header('Location: login.php?error=Username already exists');
	else:
		$_SESSION["userForm"]= array();
		$_SESSION["userForm"]["username"] = $username;
		$_SESSION["userForm"]["password"] = $password1;
		header('Location: register2.php');
	endif;
}

function register_step_2()
{
	//date in mm/dd/yyyy format; or it can be in other formats as well
		$model = user();
		$model->obj["username"] = $_SESSION["userForm"]["username"];
		$model->obj["password"] = md5($_SESSION["userForm"]["password"]);
		$model->obj["tempPassword"] = $_SESSION["userForm"]["password"];
		$model->obj["firstName"] = $_POST["firstName"];
		$model->obj["lastName"] = $_POST["lastName"];
		$model->obj["phone"] = $_POST["phone"];
		$model->obj["role"] = "Customer";
		$model->obj["status"] = "Active";
		$model->obj["street"] = $_POST["street"];
		$model->obj["brgy"] = $_POST["brgy"];
		$model->obj["city"] = $_POST["city"];
		$model->obj["province"] = $_POST["province"];
		$model->obj["dateAdded"] = "NOW()";
		$model->create();
	header('Location: success.php');
}

function change_password(){
		$password1 = $_POST["password1"];
		$password2 = $_POST["password2"];

		if ($password1!=$password2) {
			header('Location: change-password.php?error=Password Not Matched');
		}
		else{
			$username = $_SESSION["user_session"]["username"];

			$model = account();
			$model->obj["password"] = md5($_POST["password1"]);
			$model->obj["tempPassword"] = $_POST["password1"];
			$model->obj["status"] = "Active";
			$model->update("username='$username'");

			header('Location: ../pages/');
		}
}

function user_logout(){
	session_destroy();
	header('Location: ../');
}

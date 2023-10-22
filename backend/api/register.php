<?php

namespace api;

use util\Response;
use model\UserModel;

require_once("Controller.php");
require_once(__DIR__ . "/../model/UserModel.php");

class Register extends Controller
{
	private $data;
	public function __construct()
	{
		$this->data = json_decode(file_get_contents("php://input"));
		$this->register();
	}
	public function register()
	{
		//verify the json content
		Controller::verifyJsonData($this->data);

		$firstname = $this->data->firstname;
		$lastname = $this->data->lastname;
		$birthdate = $this->data->birthdate;
		$gender = $this->data->gender;
		$email = $this->data->email;
		$phonenumber = $this->data->phonenumber;
		$password = $this->data->password;

		//validate required input fields
		if (
			!isset($firstname) || empty($firstname) ||
			!isset($lastname) || empty($lastname) ||
			!isset($birthdate) || empty($birthdate) ||
			!isset($gender) || empty($gender) ||
			!isset($email) || empty($email) ||
			!isset($password) || empty($password)
		) {
			(!isset($firstname) || empty($firstName) ? $responseMessage = "Firstname field is required!" : false);
			(!isset($lastname) || empty($lastname) ? $responseMessage = "Lastname field is required!" : false);
			(!isset($birthdate) || empty($birthdate) ? $responseMessage = "Birthdate field is required!" : false);
			(!isset($gender) || empty($gender) ? $responseMessage = "Gender field is required!" : false);
			(!isset($email) || empty($email) ? $responseMessage = "Email field is required!" : false);
			(!isset($password) || empty($password) ? $responseMessage = "Password field is required!" : false);
			Response::sendResponse(400, false, $responseMessage);
			exit;
		}


		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			Response::sendResponse(422, false, "Invalid email format");
			exit;
		}
		//validate password
		if (strlen($password) < 8) {
			Response::sendResponse(422, false, "Password must be atleast 8 characters long!");
			exit;
		}

		$userModel = new UserModel();

		//check if email is taken
		if ($userModel->find($email,  "email")) {
			Response::sendResponse(409, false, "Email already taken!");
			exit;
		}

		//encypt the password
		$password = password_hash($password, PASSWORD_DEFAULT);

		$userModel->setFirstName($firstname);
		$userModel->setLastName($lastname);
		$userModel->setBirthDate($birthdate);
		$userModel->setGender($gender);
		$userModel->setEmail($email);
		$userModel->setPhoneNumber($phonenumber);
		$userModel->setPassword($password);

		$result = $userModel->create();

		if (!$result) {
			Response::sendResponse(400, false, "Registration failed");
		} else {
			Response::sendResponse(201, true, "You have successfully registered");
		}
	}
}
new Register();

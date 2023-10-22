<?php

namespace api;

use model\UserModel;
use util\Response;

require_once("Controller.php");
require_once(__DIR__ . "/../model/UserModel.php");

class Login extends Controller
{
	private $data;

	public function __construct()
	{
		$this->data = json_decode(file_get_contents("php://input"));
		$this->login();
	}
	public function login()
	{
		//verify json data
		Controller::verifyJsonData($this->data);

		$email = $this->data->email;
		$password = $this->data->password;

		//verify fields
		if (
			!isset($email) || empty($email) ||
			!isset($password) || empty($password)
		) {
			(!isset($email) || empty($email) ? $responseMessage = "Email field is required!" : false);
			(!isset($password) || empty($password) ? $responseMessage = "Password field is required!" : false);
			Response::sendResponse(400, false, $responseMessage);
			exit;
		}
		$usermodel = new UserModel();
		$result = $usermodel->find($email, "email");

		if (!$result || !password_verify($password, $result["password"])) {
			Response::sendResponse(401, false, "Invalid credentials");
			exit;
		}

		Response::sendResponse(200, true, "Login succesfully");
	}
}
new Login();

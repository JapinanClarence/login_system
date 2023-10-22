<?php

namespace model;

require_once(__DIR__ . "/../util/dump.php");
require_once(__DIR__ . "/../util/Response.php");
require_once(__DIR__ . "/../database/Database.php");

use Exception;
use util\Response;
use Database\Database;



class UserModel
{
	private $userId;
	private $firstName;
	private $lastName;
	private $birthDate;
	private $gender;
	private $email;
	private $phoneNumber;
	private $password;

	private const TABLE = "users";

	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}
	public function setBirthDate($birthDate)
	{
		$this->birthDate = $birthDate;
	}
	public function setGender($gender)
	{
		$this->gender = $gender;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
	public function setPhoneNumber($phoneNumber)
	{
		$this->phoneNumber = $phoneNumber;
	}
	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function create()
	{
		try {
			$query = "INSERT INTO " . self::TABLE . " SET first_name = :firstName, last_name = :lastName, birthday = :birthDay, gender = :gender, email = :email, phone_number = :phoneNumber, password = :password";

			$stmt = Database::connect()->prepare($query);

			$stmt->bindParam(":firstName", $this->firstName);
			$stmt->bindParam(":lastName", $this->lastName);
			$stmt->bindParam(":birthDay", $this->birthDate);
			$stmt->bindParam(":gender", $this->gender);
			$stmt->bindParam(":email", $this->email);
			$stmt->bindParam(":phoneNumber", $this->phoneNumber);
			$stmt->bindParam(":password", $this->password);

			if (!$stmt->execute()) {
				return false;
				exit;
			}
			return true;
		} catch (Exception $e) {
			$responseMessage = "Error: {$e->getMessage()} on line {$e->getLine()}";
			Response::sendResponse(500, false, $responseMessage);
		}
	}
	public function find($column, $condition)
	{
		try {
			$query = "SELECT * FROM " . self::TABLE . " WHERE $condition = :$condition";

			$stmt = Database::connect()->prepare($query);

			$stmt->bindParam(":$condition", $column);
			$stmt->execute();

			//count result
			$rowCount = $stmt->rowCount();

			if ($rowCount == 0) {
				return null;
				exit;
			}

			$result = $stmt->fetch();
			return $result;
		} catch (Exception $e) {
			$responseMessage = "Error: {$e->getMessage()} on line {$e->getLine()}";
			Response::sendResponse(500, false, $responseMessage);
		}
	}
}

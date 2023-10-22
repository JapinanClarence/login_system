<?php

namespace Database;

require_once("../util/Response.php");

use PDO;
use PDOException;
use util\Response;



class Database
{
	const HOST = "localhost";
	const USERNAME = "root";
	const DATABASE = "my_project";
	const PASSWORD = "";

	public static function connect()
	{
		try {
			$dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DATABASE;
			$pdo = new PDO($dsn, self::USERNAME, self::PASSWORD);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		} catch (PDOException $e) {
			error_log("Connection failed" . $e, 0);
			$response = new Response();
			$response->sendResponse(500, false, "Database connection failed");
			exit;
		}
		return $pdo;
	}
}

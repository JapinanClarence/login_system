<?php

namespace api;

use util\Response;

require_once(__DIR__ . "/../util/header.php"); //required headers
require_once(__DIR__ . "/../util/Response.php"); //includes the response class

class Controller
{

	/**
	 * Verify json content method
	 * @return response message
	 */
	public static function verifyJsonData($data)
	{
		//check content type 
		if (!array_key_exists("CONTENT_TYPE", $_SERVER) || $_SERVER["CONTENT_TYPE"] !== "application/json") {
			Response::sendResponse(400, false, "Content type header not set to JSON");
			exit;
		}
		//validate if the request body is valid json
		if (!$data) {
			Response::sendResponse(400, false, "Request body is not valid JSON");
			exit;
		}
	}
}

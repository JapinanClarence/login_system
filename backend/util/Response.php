<?php

namespace util;

class Response
{
	/**
	 * Sends a response body
	 * @param int $statusCode HTTP status code
	 * @param bool $success verifies if the request is succesfull
	 * @param mixed $message the response messgae
	 * @param mixed $data the response data
	 * @param bool $toCache verifies if cache'ing is allowed
	 */
	final public static function sendResponse(int $statusCode, bool $success, $message = [], $data = null, bool $toCache = false)
	{
		//declare a response data array
		$responseData = array();

		header('Content-type: application/json;charset=utf-8');

		if ($toCache == true) {
			header('Cache-control: max-age=60');
		} else {
			header('Cache-control: no-cache, no-store');
		}

		if (($success !== false && $success !== true) || !is_numeric($statusCode)) {
			http_response_code(500);

			$responseData['statusCode'] = 500;
			$responseData['success'] = false;
			$messages[] = "Response creation error";
			$responseData['message'] = $messages;
		} else if (is_null($message)) {

			http_response_code($statusCode);
			$responseData['statusCode'] = $statusCode;
			$responseData['success'] = $success;
			$responseData['data'] = $data;
		} else if (!isset($data)) {

			http_response_code($statusCode);
			$responseData['statusCode'] = $statusCode;
			$responseData['success'] = $success;
			$responseData['message'] = $message;
		} else {
			http_response_code($statusCode);
			$responseData['statusCode'] = $statusCode;
			$responseData['success'] = $success;
			$responseData['message'] = $message;
			$responseData['data'] = $data;
		}
		echo json_encode($responseData);
	}
}

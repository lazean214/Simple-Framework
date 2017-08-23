<?php

namespace App;

use App\Configuration as Config;
class Api {
	public static function consumeApi($type){

		$authorization = "Authorization: Bearer " . API_TOKEN;

		$url = Config::API_URL_1 .$type;

		$cURL = curl_init();

		curl_setopt($cURL, CURLOPT_URL, $url);
		curl_setopt($cURL, CURLOPT_HTTPGET, true);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Accept: application/json', $authorization,
		));

		$result = curl_exec($cURL);

		curl_close($cURL);

		$json = json_decode($result);

		return $json;
	}

	
}
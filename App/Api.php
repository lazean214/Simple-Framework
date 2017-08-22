<?php

namespace App;

use App\Configuration as Config;
class Api {
	public static function getLists($type){

		$authorization = "Authorization: Bearer 32mQCAQxgLYNYOV4nG2jCBx37eMmx2HHtbf61V1X0UcuLKKrLefaPdOCSy05OET";

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

	public static function getSubLists($slug){

		$authorization = "Authorization: Bearer 32mQCAQxgLYNYOV4nG2jCBx37eMmx2HHtbf61V1X0UcuLKKrLefaPdOCSy05OET";

		$url = Config::API_URL_2 . $slug;

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

	public static function getDetails($slug){

		$authorization = "Authorization: Bearer 32mQCAQxgLYNYOV4nG2jCBx37eMmx2HHtbf61V1X0UcuLKKrLefaPdOCSy05OET";

		$url = Config::API_URL_3 . $slug;
		//$url = 'http://laravelapi.dev/api/childDetail/' . $slug;

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

	public function getHotels($slug){



		$url = Config::HOTEL_API . $slug;

		$cURL = curl_init();

		curl_setopt($cURL, CURLOPT_URL, $url);
		curl_setopt($cURL, CURLOPT_HTTPGET, true);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Accept: application/json',
		));

		$result = curl_exec($cURL);


		curl_close($cURL);

		$json = json_decode($result);

		return $json;
	}

	//https://www.google.ae/search?q=Cassells+Al+Barsha&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjU08nD7d3VAhXoApoKHSeWAq0Q_AUICigB&biw=1440&bih=770
	
	 public function getHotelImage(){



		$url = "https://www.google.ae/search?q=Cassells+Al+Barsha&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjU08nD7d3VAhXoApoKHSeWAq0Q_AUICigB&biw=1440&bih=770";

		$cURL = curl_init();

		curl_setopt($cURL, CURLOPT_URL, $url);
		curl_setopt($cURL, CURLOPT_HTTPGET, true);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Accept: application/json',
		));

		$result = curl_exec($cURL);


		curl_close($cURL);

		$json = json_decode($result);

		return $json;
	}
}
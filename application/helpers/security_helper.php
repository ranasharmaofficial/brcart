<?php

function encrypt_url($string) {
	if(!ENC_DEC_STATUS){
		return $string;
	}
	$output = false;
	/*read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code*/
	$file_path = APPPATH.'third_party/security.ini';
	$security = parse_ini_file($file_path);
	$secret_key = $security['encryption_key'];
	$secret_iv = $security['iv'];
	$encrypt_method = $security['encryption_mechanism'];
	// hash
	$key = hash('sha256', $secret_key);
	// iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
	$iv = substr(hash('sha256', $secret_iv), 0, 16);
	//do the encryption given text/string/number
	$result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	$output = base64_encode($result);
	return $output;
}

function decrypt_url($string) {
	if(!ENC_DEC_STATUS){
		return $string;
	}
	$output = false;
	/*read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code*/
	$file_path = APPPATH.'third_party/security.ini';
	$security = parse_ini_file($file_path);
	$secret_key = $security['encryption_key'];
	$secret_iv = $security['iv'];
	$encrypt_method = $security['encryption_mechanism'];
	// hash
	$key = hash('sha256', $secret_key);
	// iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
	$iv = substr(hash('sha256', $secret_iv), 0, 16);
	//do the decryption given text/string/number
	$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	return $output;
}

function getDecryptArray($postVal=array()){
	$result = array();
	if(!empty($postVal)){
		foreach($postVal as $key=>$val){
			$result[$key] = decrypt_url($val);
		}
	}
	return $result;
}

?>

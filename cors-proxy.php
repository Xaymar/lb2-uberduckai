<?php
// This PHP script aids in breaking out of the CORS jail the file:// protocol puts
// us in. It does so by proxying the request to certain whitelisted domains.

// --------------------------------------------------------------------------------
// Configuration
// --------------------------------------------------------------------------------

// A list of all allowed domains that we allow proxying for.
$host_whitelist = [
	"/^api\.uberduck\.ai$/uim",
	"/^uberduck-audio-outputs\.[a-zA-Z0-9\-_]+\.amazonaws\.com$/uim",
];

// --------------------------------------------------------------------------------
// Implementation
// --------------------------------------------------------------------------------

// Decode the instructions given via the URL, could probably make this faster to 
// run by using POST and making the method selection part of the JSON.
$query_data = urldecode($_SERVER['QUERY_STRING']);
$query_json = json_decode($query_data);

// Check the given URL against the whitelist(s).
$query_whitelisted = false;
$url = parse_url($query_json->url);
if ($url == false) {
	http_response_code(400);
	header("Cache-Control: no-cache", true);
	header("Access-Control-Allow-Origin: *", true);
	header("Access-Control-Allow-Origin: null");
	header("Vary: Origin");
	die();
}
foreach($host_whitelist as &$host) {
	if (preg_match($host, $url["host"]) === 1) {
		$query_whitelisted = true;
		break;
	}
}
if (!$query_whitelisted) {
	http_response_code(403);
	header("Cache-Control: no-cache", true);
	header("Access-Control-Allow-Origin: *", true);
	header("Access-Control-Allow-Origin: null");
	header("Vary: Origin");
	die();
}

// Perform the query if everything is fine.
$curl = curl_init($query_json->url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $query_json->headers);
curl_setopt($curl, CURLOPT_HTTP_CONTENT_DECODING, false);
curl_setopt($curl, CURLOPT_HEADER, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CRLF, false);
if ($_SERVER['REQUEST_METHOD'] === "GET") {
	curl_setopt($curl, CURLOPT_HTTPGET, true);
} else if ($_SERVER['REQUEST_METHOD'] === "PUT") {
	curl_setopt($curl, CURLOPT_POSTFIELDS, $query_json->body);
	curl_setopt($curl, CURLOPT_PUT, true);
} else if ($_SERVER['REQUEST_METHOD'] === "POST") {
	curl_setopt($curl, CURLOPT_POSTFIELDS, $query_json->body);
	curl_setopt($curl, CURLOPT_POST, true);
}
if($result = curl_exec($curl)) {		
	// HTTP Responses are rather simple:
	// 1. Lines end in \r\n or \n, never just \r.
	// 2. Special symbols must be encoded differently.
	// 3. Headers and Content are spaced with a single blank line.
	$idx = 0;
	$rdx = 0;
	$edx = strlen($result);
	$have_http = false;
	$have_headers = false;
	for ($idx = 0; $idx <= $edx; $idx++) {
		$chr = $result[$idx];
		
		if ((($chr == "\r") && ($result[$idx + 1] == "\n")) 
			|| ($chr == "\n")
			|| ($idx == $edx)) {
			$length = $idx - $rdx;
			$text = substr($result, $rdx, $length);
			
			$rdx = $idx + 1;
			if ($chr == "\r") {
				$rdx++;
				$idx++;
			}

			if ($have_http == false) {
				// Ignore HTTP opener.
				$have_http = true;
			} else if ($have_headers == false) {
				if ($length > 0) {
					header($text);
				} else {
					// Empty line means we now have headers.
					http_response_code(curl_getinfo($curl, CURLINFO_HTTP_CODE));
					header("Cache-Control: no-cache", true);
					header("Access-Control-Allow-Origin: *", true);
					header("Access-Control-Allow-Origin: null");
					header("Vary: Origin");
					$have_headers = true;
					break;
				}
			} else {
				//echo($text);
			}
		}
	}
	if ($rdx < $edx)
		echo(substr($result, $rdx));
} else {
	http_response_code(500);
	var_dump($query_json);
}
curl_close($curl);
?>
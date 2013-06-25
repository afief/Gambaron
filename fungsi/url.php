<?php	

class url {	
	function ambilkontrol() {
		
		$aurl = substr(baseURL, (strpos(baseURL,$_SERVER['SERVER_NAME']) + strlen($_SERVER['SERVER_NAME'])));
		$burl = substr($_SERVER['REQUEST_URI'], strlen($aurl));
		
		$burl = $burl . '?';
		
		$burl = substr($burl, 0, strpos($burl, '?'));
		
		$data = explode('/', $burl);
		
		if ($data[0] == 'index.php') array_splice($data, 0, 1);
		
		return $data;
	}
}
$url = new url();
	
?>
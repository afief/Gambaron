<?php if (!defined('baseURL')) exit('tidak lewat index');

class unggah extends sl_kontrol {
	function __construct() {
		parent::__construct();
	}
	function index() {
		global $db;
		global $usr;
		global $sl;
		
		if ($usr->isLogin() && isset($_POST['dgambar'])) {
			$usid = $usr->id();
			$data = $_POST['dgambar'];
			$nama = $_POST['ngambar'];
			if ((substr($data, 0, 1) == "[") && (substr($data, strlen($data)-1, 1))) {
				$db->query("INSERT INTO `g_data` (`id`, `user_id`, `nama`, `data`, `waktu`) VALUES (NULL, '" . $usid . "', '" . $nama . "', \"" . $data .  "\", CURRENT_TIMESTAMP);");
				$idnya = $db->query_array("SELECT * FROM `g_data` WHERE `user_id` = '" . $usid . "' ORDER BY `id` DESC;");
				if (count($idnya) > 0 ) {
					$idnya = $idnya[0]['id'];
					echo $idnya;
				} else {
					echo "";
				}
			} else {
				echo "";
			}
		} else {
			echo "";
		}
	}
}

?>
<?php

class sl_kontrol {

	function __construct() {
		
	}
	public function url() {
		$s = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		$s = $s . '?';
		$s = substr($s, 0, strpos($s, '?'));
		return $s;
	}
	public function cekTampilan($nama) {
		global $tampilandir;
		if (file_exists($tampilandir . '/' . $nama . '.php')) {
			return true;
		} else {
			echo '<p><b>tampilan <u>' . $nama . '</u> tidak ditemukan</b></p>';
			return false;
		}
	}
	function tampilkan($tampilan, $data = array()) {
		global $tampilandir;
		global $kontrol;
		global $sl;
		global $db;
		global $usr;
		
		extract($data);
		
		if ($this->cekTampilan($tampilan)) {
			include $tampilandir . '/' . $tampilan . '.php';
		}
	}

	//fungsi tambahan untuk gambaron
	function ceknotif() {
		global $usr;
		if ($usr->isLogin()) {
			global $db;
			$hasil = $db->query_array("SELECT COUNT(*) FROM `g_notif` WHERE `ke_id` = '" . $usr->id() . "' AND `status` LIKE '1'");
			return $hasil[0][0]; 
		} else {
			return 0;
		}
		return 0;
	}
	function idPemilikGambar($id) {
		global $db;
		$hasil = $db->query_array("SELECT `user_id` FROM `g_data` WHERE `id` = '" . $id . "' LIMIT 0, 1");
		if (count($hasil) > 0) {
			return $hasil[0]['user_id'];
		} else {
			return 0;
		}
	}
}

?>
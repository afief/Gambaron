<?php

class usr {
	
	function setlogin($id, $nama, $ket = '') {
		setcookie('slid', $id, 0, '/');
		setcookie('slnama', $nama, 0, '/');
		setcookie('slket', $ket, 0, '/');
	}
	function logout() {
		
		setcookie('slid', '', -1, '/');
		setcookie('slnama', '', -1, '/');
		setcookie('slket', '', -1, '/');
	}
	
	function id() {
		if ($this->isLogin()) {
			return $id = $_COOKIE['slid'];
		} else {
			return false;
		}
	}
	function emailDariId($id) {
		global $db;
		
		$hasil = $db->query_array("SELECT * FROM `g_user` WHERE `id` = '" . $id . "' LIMIT 0, 1");
		if (count($hasil) > 0) {
			return $hasil[0]['email'];
		} else {
			return false;
		}
	}
	function namaDariId($id, $username = 0) {
		global $db;
		
		$hasil = $db->query_array("SELECT * FROM `g_user` WHERE `id` = '" . $id . "' LIMIT 0, 1");
		if (count($hasil) > 0) {
			if ($username) {
				return $hasil[0]['nama'];
			} else {
				return $hasil[0]['ndepan'] . " " . $hasil[0]['nbelakang'];
			}
		} else {
			return false;
		}
	}
	function nama() {
		if ($this->isLogin()) {
			return $id = $_COOKIE['slnama'];
		} else {
			return false;
		}
	}
	
	function isLogin() {
		if (isset($_COOKIE['slid']) && isset($_COOKIE['slnama']) && ($_COOKIE['slid'] != '') && ($_COOKIE['slnama'] != '')) {
			global $db;
			
			$id = $_COOKIE['slid'];
			$nama = $_COOKIE['slnama'];
			
			$kueri = $db->query_array("SELECT `id`, `nama`, `status` FROM `g_user` WHERE `id` = " . $id . " AND `nama` = '" . $nama . "'");
			
			if (count($kueri) > 0) {
				return $kueri[0]['status'];
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
}
$usr = new usr();

?>
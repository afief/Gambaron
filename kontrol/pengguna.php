<?php if (!defined('baseURL')) exit('tidak lewat index');

class pengguna extends sl_kontrol {
	function __construct() {
		parent::__construct();
	}
	function index() {

	}
	function ambilnilai($id) {
		global $db;

		$datan = $db->query_array("SELECT COUNT(*) FROM `g_jawaban` WHERE `user_id` = '" . $id . "'");
		return $datan[0][0];
	}
	function nama($nama) {
		global $db;
		global $usr;
		global $sl;
		
		$data = $db->query_array("SELECT * FROM `g_user` WHERE `nama` = '" . $nama . "' LIMIT 0, 1;");
		if (count($data) > 0) {
			$usid = $data[0]['id'];
			$datap = $db->query_array("SELECT * FROM `g_data` WHERE `user_id` = '" . $usid . "' ORDER BY `id` DESC LIMIT 0, 30;");
			$datan = $db->query_array("SELECT COUNT(*) FROM `g_jawaban` WHERE `user_id` = '" . $usid . "'");
			$this->tampilkan("pengguna", array('pengguna' => $data[0], 'gambars' => $datap, 'nilai' => $datan[0][0]));
		} else {
			echo "tidak ada pengguna dengan nama " . $nama;
		}
	}
	function daftar() {
		global $db;
		global $usr;
		global $sl;

		$data = $db->query_array("SELECT * FROM `g_user` WHERE `status` = '1' LIMIT 0, 30;");
		if (count($data) > 0) {
			for ($i = 0; $i < count($data); $i++) {
				$data[$i]['nilai'] = $this->ambilnilai($data[$i]['id']);
			}
			$this->tampilkan("daftarpengguna", array("data" => $data, "users" => $data));
		} else {
			echo "aya nu teu beres yeuh... ";
		}
		
	}
}

?>
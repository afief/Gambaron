<?php if (!defined('baseURL')) exit('tidak lewat index');

class notifikasi extends sl_kontrol {
	function __construct() {
		parent::__construct();
	}
	function index() {
		global $db;
		global $usr;
		global $sl;

		if ($usr->isLogin()) {
			$db->query("UPDATE `g_notif` SET `status` = '0' WHERE `ke_id` = " . $usr->id() . ";");
			$hasil = $db->query_array("SELECT * FROM `g_notif` WHERE `ke_id` = '" . $usr->id() . "' ORDER BY `waktu` DESC");
			$this->tampilkan("notifikasi", array("data" => $hasil, "hasil" => $hasil));
		} else {
			$sl->redirect(baseURL);
		}
	}
}

?>
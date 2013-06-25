<?php if (!defined('baseURL')) exit('tidak lewat index');

class lihat extends sl_kontrol {
	function __construct() {
		parent::__construct();
	}
	function index() {
		global $sl;
		$sl->redirect(baseURL);
	}
	function id($id) {
		global $db;
		global $usr;
		global $sl;
		
		if ($usr->isLogin() && ($id > 0)) {
			$datanya = $db->query_array("SELECT * FROM `g_data` WHERE `id` = '" . $id . "' LIMIT 0, 1;");
			if (count($datanya) > 0) {
				$benar = "";
				$data = $db->query_array("SELECT * FROM `g_jawaban` WHERE `g_id` = '" . $id . "' ORDER BY `waktu` DESC");
				foreach ($data as $baris) {
					if (($baris['benar'] == 1) && ($baris['user_id'] == $usr->id())) $benar = $baris['jawaban'];
				}	 
				
				$this->tampilkan('lihat', array("jawaban" => $benar, "gambarid" => $id, "data" => $datanya[0]['data'], 'djawab' => $data));
			} else {
				$sl->redirect(baseURL);
			}
		} else {
			$sl->redirect(baseURL . "login?lompat=" . baseURL . "lihat/id/" . $id);
		}
	}
}

?>
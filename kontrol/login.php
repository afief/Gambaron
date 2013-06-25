<?php if (!defined('baseURL')) exit('tidak lewat index');

class login extends sl_kontrol {
	function __construct() {
		parent::__construct();
	}
	function index() {
		global $db;
		global $usr;
		global $sl;
		if (isset($_POST['masuk'])) {
			global $db;
			$nama = $_POST['nama'];
			$pass = md5($_POST['pass']);

			//echo "SELECT `id`, `nama` FROM `g_user` WHERE `nama` = " . $nama . " AND `password` = '" . $pass . "'";
			$kueri = $db->query_array("SELECT `id`, `nama` FROM `g_user` WHERE `nama` = '" . $nama . "' AND `password` = '" . $pass . "'");
			
			if (count($kueri) > 0) {
				$usr->setlogin($kueri[0]['id'], $kueri[0]['nama']);
				//echo $kueri[0]['id'] . ";;" . $kueri[0]['nama'];
				
				if (isset($_GET['lompat'])) {
					//echo $_GET['lompat'];
					$sl->redirect($_GET['lompat']);
				} else {
					$sl->redirect(baseURL);
				}
			} else {
				echo "user/password salah";
			}
		} else {
			if ($usr->isLogin()) {
				$sl->redirect(baseURL);
			} else {
				$this->tampilkan("login");
			}
		}
	}
	public function gantipass() {
		global $usr;
		global $sl;
		global $db;
		
		if ($usr->isLogin()) {
			if (isset($_POST['masuk'])) {
				if ($_POST['pass1'] == $_POST['pass2']) {
					$kueri = $db->query("UPDATE `g_user` SET `password` = MD5('" . $_POST['pass1'] . "') WHERE `g_user`.`id` = " . $usr->ID() . ";");
					$sl->redirect(baseURL);
				} else {
					$this->tampilkan("gantipass");
				}
			} else {
				$this->tampilkan("gantipass");
			}
		} else {
			$sl->redirect(baseURL);
		}
	}
	public function logout() {
		global $usr;
		global $sl;
		$usr->logout();
		
		if (isset($_GET['lompat'])) {
			$sl->redirect($_GET['lompat']);
		} else {
			$sl->redirect(baseURL);
		}
	}
}

?>
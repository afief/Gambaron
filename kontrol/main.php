<?php if (!defined('baseURL')) exit('tidak lewat index');

class main extends sl_kontrol {
	function __construct() {
		parent::__construct();
	}
	function index() {
		global $db;
		global $usr;
		global $sl;
		
		if ($usr->isLogin()) {
			$this->tampilkan('permainan');
		} else {
			$sl->redirect(baseURL . "login?lompat=" . baseURL . "main");
		}
	}
	function jawab() {
		global $usr;
		global $db;
		global $sl;
		
		if ($usr->isLogin() && isset($_POST['nama']) && isset($_POST['jawab'])) {
			$jawaban = $_POST['nama'];
			$gid = $_POST['gid'];
			
			$dgambar = $db->query_array( $db->prepare("SELECT * FROM `g_data` WHERE `id` = %d LIMIT 0, 1;", $gid));
			if (count($dgambar) > 0) {
				$namabenar = $dgambar[0]['nama'];
				$usidgambar = $dgambar[0]['user_id'];
				if (strtolower($namabenar) == strtolower($jawaban)) {
					$tambah = $db->query( $db->prepare("INSERT INTO `g_jawaban` (`g_id`, `user_id`, `jawaban`, `benar`) VALUES ('%d', '%d', '%s', '1');", $gid, $usr->id(), $jawaban));
					$tambah2 = $db->query( $db->prepare("INSERT INTO `g_notif` (`id`, `teks`, `dari_id`, `ke_id`, `link`, `status`, `waktu`) VALUES (NULL, 'menjawab gambar <i>" . $namabenar . "</i> anda dengan <b>benar</b>.', '" . $usr->id() . "', '" . $usidgambar . "', 'lihat/id/" . $gid . "', '1', CURRENT_TIMESTAMP);"));
					echo "benar";
				} else {
					$teksjawab = "<salah>menjawab <b>salah</b> gambar <i>" . $namabenar . "</i>. Dia menjawab " . $jawaban . "</salah>";
					$tambah = $db->query( $db->prepare("INSERT INTO `g_jawaban` (`g_id`, `user_id`, `jawaban`, `benar`) VALUES ('%d', '%d', '%s', '0');", $gid, $usr->id(), $jawaban));
					$tambah2 = $db->query( $db->prepare("INSERT INTO `g_notif` (`id`, `teks`, `dari_id`, `ke_id`, `link`, `status`, `waktu`) VALUES (NULL, '%s', '" . $usr->id() . "', '" . $usidgambar . "', 'lihat/id/%d', '1', CURRENT_TIMESTAMP);", $teksjawab, $gid));					
					echo "BENAR!";
				}
			} else {
				echo 'ada yang salah : ' . $gid;
			}
		} else {
			echo "b";
		}
	}
}

?>
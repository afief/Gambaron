<?php if (!defined('baseURL')) exit('tidak lewat index');

class awal extends sl_kontrol {
	function __construct() {
		parent::__construct();
	}
	function index() {
		global $db;

		$this->tampilkan('beranda');
	}
}

?>
<?php

class sl {
	public function kontrolAwal() { //masuk ke dalam kontroller awal
		global $pengaturan;
		$kelas = $this->kontrolBaru($pengaturan['kontrolAwal']); //masuk ke kelas awal
	   $kelas->index();
	}
	public function kontrolBaru($nama) { //masuk ke kontrol sesuai dengan namanya
		global $regKontrol;
		global $kontroldir;
		
		include $kontroldir . '/' . $regKontrol[$nama] . '.php';
		return new $regKontrol[$nama]();
	}
	
	public function cekKontrol($nama) { //memeriksa apakah kontrol telah dibuat
		global $regKontrol;
	
		if (isset($regKontrol[$nama])) {
			return true;
		} else {
			return false;
		}
	}
	
	//fungsi untuk menampilkan tag link
	public function ambilCSS($nama) {
		$data = "<link rel='stylesheet' type='text/css' href='" .
					baseURL . "data/" . $nama . ".css' />";
		echo $data;
	}
	
	public function ambilJS($nama) {
		$data = "<script type='text/javascript' src='" .
					baseURL . "data/" . $nama . ".js' ></script>";
		echo $data;
	}
	public function ambilData($nama) {
		$data = baseURL . "data/" . $nama;
		echo $data;
	}
	public function redirect($alamat) {
		header("Location: " . $alamat);
	}
}
$sl = new sl();

?>
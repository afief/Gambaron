<?php
	
	require_once 'fungsi/variabel.php';
	require_once 'fungsi/url.php';
	require_once 'fungsi/sl.php';
	require_once 'fungsi/sl_kontrol.php';
	
	require 'fungsi/kelass.php';
	require 'fungsi/db.php';
	require 'fungsi/usr.php';

	$kontrol = $url->ambilkontrol();
	
	if ((count($kontrol) > 0) && ($kontrol [0] != '')) {
		
		//masuk ke kelas selain kelas awal
		if ($sl->cekKontrol($kontrol[0])) {
			$kelas = $sl->kontrolBaru($kontrol[0]);
		} else {
			$sl->redirect(baseURL);
		}
		
		if ((count($kontrol) > 1) && ($kontrol [1] != '')) { //masuk ke fungsi di dalam kelas
			$kontrol = array_slice($kontrol, 1);
			
			if (!$kontrol[0]) $kontrol[0] = 'index';			
			
			$kelasfungsi = $kontrol[0];
			
			$kontrol = array_slice($kontrol, 1);
			
			for ($i = count($kontrol); $i < 20; $i++) {
				$kontrol[$i] = null;
			}
			
			if (method_exists($kelas, $kelasfungsi)) {
			$kelas->$kelasfungsi($kontrol[0],
										$kontrol[1],
										$kontrol[2],
										$kontrol[3],
										$kontrol[4],
										$kontrol[5],
										$kontrol[6],
										$kontrol[7],
										$kontrol[8],
										$kontrol[9],
										$kontrol[10],
										$kontrol[11],
										$kontrol[12],
										$kontrol[13],
										$kontrol[14],
										$kontrol[15],
										$kontrol[16],
										$kontrol[17],
										$kontrol[18],
										$kontrol[19]);
			} else {
				$kelas->index();
			}
		} else {
			$kelas->index();
		}
		
	} else {
	   $sl->kontrolAwal();
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo namaSitus; ?></title>
<?php
	$sl->ambilCSS('afynr');
	$sl->ambilJS('kinetic-v4.0.3.min');
	$sl->ambilJS('js');
?>

</head>
<body>
<?php include "header.php"; ?>

	<div id="page">
		<div id="kontrol">
	        <h2>Nama Gambar</h2>
			<input id="inama" style="width:100%;" onChange="ngambar = this.value;" type="text">
        	<h2 id="jwarna">Warna (#000)</h2>
			<ul id="warna">
			</ul>
            <h2>Ketebalan</h2>
            <input id="itebal" type="number" min="1" max="50" onChange="tebalGaris = this.value;" value="5">
            <div class="mtombol">
            <button onclick="hapusSemua()">Hapus Gambar</button>
            <button onclick="unduh()">Unduh Gambar</button>
            <button onClick="unggah()">Selesai</button>
            </div>
		</div>
		<div id="kontainer">
		</div>
	</div>
	
	<div class="iloading" id="iloading">LOADING</div>
	
</body>
</html>
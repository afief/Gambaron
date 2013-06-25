<!DOCTYPE HTML>
<html>
<head>
	<title><?php echo namaSitus; ?></title>
    <?php 
		echo $sl->ambilCSS('afynr'); 
	?>
</head>
<body>
<?php include "header.php"; ?>
    
    <div id="page">
	    <div class="konten">
    		<h2 style="text-align:center">Gambaron!</h2>
            <a class="buttonbig" href="<?php echo baseURL; ?>main">Buat Gambar Baru!</a>
            <a class="buttonbig" href="<?php echo baseURL; ?>pengguna/daftar">DAFTAR PEMAIN!</a>
	    </div>
	    <div class="konten">
    		<h2>About</h2>
            <p>Gambaron adalah sebuah game berbagi gambar dimana salah satu pemainnya menggambar, sedangkan pemain lain menebak gambar tersebut.</p>
            <p>Butuh akun? mention ke <a href="http://twitter.com/afynr" target="_blank">@afynr</a>. fungsi registrasi belum dibuat.</p>
	    </div>
    </div>
    
</body>
</html>
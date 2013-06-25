	<div id="header">
    	<div id="menu">
			<?php if ($usr->isLogin()) { ?>
				<a href="<?php echo baseURL; ?>login/logout">Logout</a>
            <a href="<?php echo baseURL; ?>pengguna/nama/<?php echo $usr->nama(); ?>"><?php echo $usr->nama(); ?></a>
            <a href="<?php echo baseURL; ?>main">Buat Gambar Baru</a>
            <?php } else { ?>
            <a href="<?php echo baseURL; ?>login">Login</a>
            <?php } ?>
			<a href="<?php echo baseURL; ?>" style="float:left;">Beranda</a>
			<a href="<?php echo baseURL; ?>pengguna/daftar" style="float:left;">Pemain</a>
			<?php if ($this->ceknotif()) { ?>
				<a href="<?php echo baseURL; ?>notifikasi" style="background-color: red; border-color: red; float: left;" ><?php echo $this->ceknotif(); ?> Pemberitahuan</a>
			<?php } else { ?>
				<?php if ($usr->isLogin()) { ?>
				<a href="<?php echo baseURL; ?>notifikasi" style="float: left;" >Pemberitahuan</a>
				<?php } ?>
			<?php } ?>
        </div>
    </div>
<!DOCTYPE HTML>
<html>
<head>
<title>  </title>

<?php
	$sl->ambilCSS('afynr');
	$sl->ambilJS("kinetic-v4.0.3.min");
?>

</head>
<body>

<?php include "header.php"; ?>

	<div id="page">
     
     <?php foreach($users as $pengguna) { ?>
			<div class="bio daftar" style="background-color: rgb(<?php echo rand(150, 255); ?>, <?php echo rand(150, 255); ?>, <?php echo rand(150, 255); ?>)">
     			<img style="float: left; margin-right: 5px;" src="http://www.gravatar.com/avatar/<?php echo md5($pengguna['email']); ?>" alt="" >
     			<div style="float: left;">
     				<div class="namalengkap">
     					<a href="<?php echo baseURL . 'pengguna/nama/' . $pengguna['nama']; ?>">
     						<?php echo $pengguna['ndepan']; ?>&nbsp<?php echo $pengguna['nbelakang']; ?>
	     				</a>
     				</div>
        			<div class="username"><?php echo $pengguna['nama']; ?></div>
        			<div style="font-size: 15px; margin-top: 10px;">Nilai : <?php echo $pengguna['nilai']; ?></div>
        		</div>
        	</div>
      <?php } ?>
       
	</div>

</body>
</html>
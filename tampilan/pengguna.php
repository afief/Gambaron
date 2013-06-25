<!DOCTYPE HTML>
<html>
<head>
<title>  </title>

<?php
	$sl->ambilCSS('afynr');
	$sl->ambilJS("kinetic-v4.0.3.min");
	$sl->ambilJS("jsdaftar");
?>

</head>
<body>

<?php include "header.php"; ?>

	<div id="page">
          
		<div id="kontainer" style="visibility: hidden; position: absolute">
		</div>
		
		<ol class="dgambars bigside" id="dgambars">
        	<?php for ($i = 0; $i < count($gambars); $i++) {
				echo "<li><a href='" . baseURL . "lihat/id/" . $gambars[$i]['id'] . "' class='linkgam' dg=\"" . $gambars[$i]['data']  . "\">";
				echo "</a></li>";
			}
			?>
       </ol>
       
     	<div class="bio side">
     		<div class="wrapper">
     			<img src="http://www.gravatar.com/avatar/<?php echo md5($pengguna['email']); ?>?s=217" alt="" >
     			<div class="namalengkap">
     				<?php echo $pengguna['ndepan']; ?>&nbsp<?php echo $pengguna['nbelakang']; ?>
     			</div>
        		<div class="username"><?php echo $pengguna['nama']; ?></div>
        		
        		<div class="namalengkap" style="margin-top: 10px">Nilai : <?php echo $nilai; ?></div>
        	</div>
      </div>       
	</div>
</body>
</html>
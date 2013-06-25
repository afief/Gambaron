<!DOCTYPE HTML>
<html>
<head>
<title>  </title>

<?php
	$sl->ambilCSS('afynr');
	$sl->ambilJS("kinetic-v4.0.3.min");
	$sl->ambilJS("jslihat");
?>

</head>
<body>

	<?php include "header.php"; ?>

	<div id="page">
		<div id="kontainer">
		</div>
        <div id="kontrol" style="margin-right:0px; margin-left:10px;">
           
			<?php if ($usr->id() != $this->idPemilikGambar($gambarid)) { ?>
			
				<?php if ($jawaban == "") { ?>
        			<h2 style="font-size:15px; margin-bottom:5px;">Gambar apakah ini?</h2>        	
         		<input style="width: 100%; padding: 5px 0px;" type="text" id="inama">
         		<a class="buttonbig" style="padding: 4px 10px; margin-left: 0px; margin-top: 0px;" onclick="menjawab()">Jawab</a>
				<?php } else { ?>
					<div class="warning">Kamu telah menjawab gambar ini dengan benar.</div>
					<h2>Gambar</h2>
					<span style="font-size: 18px; font-weight: bold; margin: 0px 0px 10px 5px; display:block">
					<?php echo $jawaban; ?>
					</span>
				<?php } ?>
         <?php } ?>
         
             <h2>Pembuat</h2>
             <span style="font-size: 18px; font-weight: bold; margin: 0px 0px 10px 5px; display:block">
            	<a href="<?php echo baseURL; ?>pengguna/nama/<?php echo $usr->namaDariId($this->idPemilikGambar($gambarid),1); ?>">
	            	<?php echo $usr->namaDariId($this->idPemilikGambar($gambarid)); ?>
            	</a>
           	 </span>
				<h2>Catatan Jawaban</h2>
				<?php foreach ($djawab as $dj) { ?>
						<div class="djawab"><?php
							if (!$dj['benar']) {
								echo "<sal>";
								if ($dj['user_id'] == $usr->id()) {
									echo "Kamu menjawab \"" . $dj['jawaban'] . "\"";
								} else {
									echo "<a href='" . baseURL . "pengguna/nama/" . $usr->namaDariId($dj['user_id'],1) . "'>" . $usr->namaDariId($dj['user_id']) . "</a> menjawab \"" . $dj['jawaban'] . "\"";
								}
								echo "</sal>";
							} else {
								if ($dj['user_id'] == $usr->id()) {
									echo "Kamu menjawab dengan benar";
								} else {
									echo "<a href='" . baseURL . "pengguna/nama/" . $usr->namaDariId($dj['user_id'],1) . "'>" . $usr->namaDariId($dj['user_id']) . "</a> menjawab dengan benar";
								}
							}
				?></div>
				<?php } ?>
        </div>
	</div>
	
	<div id="iloading" class="iloading">LOADING</div>
	
<script type="text/javascript">
	var datanya = <?php echo $data; ?>;
	gid = <?php echo $gambarid ?>;
</script>

</body>
</html>
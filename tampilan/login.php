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
    		<h2 style="text-align:center">LOGIN</h2>
				<form action="" method="POST">
					<label for="uname">Username: </label>
					<input type="text" name="nama" id="uname" />
					<label for="upass">Password: </label>
					<input type="password" name="pass" id="upass" />
				<input type="submit" name="masuk" value="Masuk" />
	</form>
		</div>
	</div>

</body>
</html>
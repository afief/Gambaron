<?php $hari = array('','Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu'); 
?>

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
    	<?php foreach ($data as $notif) { ?>
    		<a class="notif" href="<?php echo baseURL . $notif['link']; ?>" style="<?php echo (substr($notif['teks'],0,7) == '<salah>')?'background-color: #f40;':''; ?>">
    			<img style="float: left; margin-right: 5px;" src="http://www.gravatar.com/avatar/<?php echo md5($usr->emailDariId($notif['dari_id'])); ?>?s=32" alt="" >
    			<?php echo $usr->namaDariId($notif['dari_id']) . " " . $notif['teks']; ?><br/>
    			<span style="font-size: 10px; font-style: italic;"><?php echo $hari[date("N", strtotime($notif['waktu']))] . date(", j-n-Y h:i A", strtotime($notif['waktu'])); ?></span>
    		</a>
    	<?php } ?>
    </div>
    
</body>
</html>
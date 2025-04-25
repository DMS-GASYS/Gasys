<!DOCTYPE html>
<html lang="en">
<head>
	<style>	
		body{background: #ecf0f1;}			
		LOGO3{
			position: absolute;
			left:400px;
			top: 100px;}					
	</style>	
</head>	
<body>
    <?php
		include "C:/XAMPP/htdocs/GUNDAR/MENU.php";	
        include "C:/XAMPP/htdocs/GUNDAR/Koneksi.php";	
        include "C:/XAMPP/htdocs/GUNDAR/Fungsi_SQL.php";			
		OPENMENU();
		
		$tsql = "SELECT COUNT(NO_INDUK) AS X FROM IDENTITAS";
		$brs=OpenBRS($tsql);	
		echo "BARIS : $brs";	
    ?>
	<LOGO3><img src="LOGO_ILHAM.jpg" width="200%" height="200%"></LOGO3>		
</body>
</html>
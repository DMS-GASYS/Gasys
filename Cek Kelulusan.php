<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="SUPPORT/MENU.css" />
<link rel="stylesheet" href="SUPPORT/GRID.css" />
<head>
	<style>	
		body{background: #ecf0f1;}			
		JUDUL{
			position: absolute;
			left:500px;
			top: 80px;}			
		JUDUL2{
			position: absolute;
			line-height: 22px;
			left:500px;
			top: 170px;}	
		JUDUL3{
			position: absolute;
			left:600px;
			top: 170px;}		
		SALAH{
			position: absolute;
			color: red;
			left:600px;
			top: 250px;}			
		TOMBOL{
			position: absolute;
			left:510px;
			top: 250px;}					
		HASIL{
			position: absolute;
			left:510px;
			top: 260px;}			
		HASIL2{
			position: absolute;
			left:700px;
			top: 270px;}			
	</style>		

</head>
<body>
    <?php
        include "C:/XAMPP/htdocs/GUNDAR/MENU.php";	
        include "C:/XAMPP/htdocs/GUNDAR/Koneksi.php";	
        include "C:/XAMPP/htdocs/GUNDAR/Fungsi_SQL.php";	
        OPENMENU();
        $noinduk = "";
        $namasis = "";
        if (isset($_POST['find1']) or isset($_POST['find2'])):
            $_SESSION['pos']=$_POST;
        endif;
        if(isset($_SESSION['pos'])):	
            $noinduk = $_SESSION['pos']['noinduk']; 
            $namasis = $_SESSION['pos']['namasis']; 
        endif;
        //====================================================================
        if(isset($_POST['find1'])):
			$namasis="";
            $tsql = "SELECT * FROM IDENTITAS WHERE NO_INDUK='$noinduk'";	
            $row=OpenSQL($tsql);
            $noinduk2 = trim($row['NO_INDUK']);
			$nama = trim($row['NAMA_SISWA']);
			$namasis = trim($row['NAMA_SISWA']);
            if ($noinduk2==""):
                echo"<h3><SALAH>DATA TIDAK DITEMUKAN</SALAH></h3>";
                GOTO LONCAT;
            endif;
            $noinduk = trim($row['NO_INDUK']);
            $tsql = "SELECT * FROM NILAI_SISWA WHERE NO_INDUK='$noinduk'";	
            $row=OpenSQL($tsql);
            $nilai = trim($row['NILAI']);
            $hasil = trim($row['HASIL']);
            echo"<HASIL>";
                echo"<div style='background-color:#ecf0f1; border: 1px solid #555; height:75px; overflow: auto; padding:10px; width:320px;'>";
                echo"NO INDUK <br>";
				echo"NAMA <br>";
                echo"NILAI <br>";
				echo"HASIL <br>";
                echo"</div>";
            echo"</HASIL>";
            echo"<HASIL2>";
                echo": $noinduk<br>";
				echo": $nama<br>";
                echo": $nilai<br>";
                echo": $hasil<br>";
            echo"</HASIL2>";
        endif;
        //==============================================================================
        if(isset($_POST['find2'])):
			$noinduk = "";
            $tsql = "SELECT * FROM IDENTITAS WHERE NAMA_SISWA='$namasis'";	
            $row=OpenSQL($tsql);
            $namasis2 = trim($row['NAMA_SISWA']);
			$nama = trim($row['NAMA_SISWA']);
            if ($namasis2==""):
                echo"<h3><SALAH>DATA TIDAK DITEMUKAN</SALAH></h3>";
                GOTO LONCAT;
            endif;
            $noinduk = trim($row['NO_INDUK']);
            $tsql = "SELECT * FROM NILAI_SISWA WHERE NO_INDUK='$noinduk'";	
            $row=OpenSQL($tsql);
            $nilai = trim($row['NILAI']);
            $hasil = trim($row['HASIL']);
            echo"<HASIL>";
				echo"<div style='background-color:#ecf0f1; border: 1px solid #555; height:75px; overflow: auto; padding:10px; width:320px;'>";
				echo"NO INDUK <br>";
				echo"NAMA <br>";
				echo"NILAI <br>";
				echo"HASIL <br>";
				echo"</div>";
            echo"</HASIL>";
            echo"<HASIL2>";
				echo": $noinduk<br>";
				echo": $nama<br>";
				echo": $nilai<br>";
				echo": $hasil<br>";
            echo"</HASIL2>";
        endif;
        LONCAT:
    ?>
   <FORM METHOD="POST" NAME="" ACTION="">
		<JUDUL><h1>LAPORAN HASIL NILAI</h1></JUDUL>
		<JUDUL2>
			No induk<br>
			Nama Siswa<br>
		</JUDUL2>
		<JUDUL3>
			<input style="background-color:white; height:17px"; type="text" name="noinduk" value="<?php echo "$noinduk"; ?>" />
			<input style="background-color:Yellow; height:20px; width:120px;" type="submit" name="find1" value="Find" >
			<input style="background-color:Yellow; height:20px; width:150px;" type="submit" name="kosongkanlayar" value="KOSONGKAN LAYAR" >
			<br>
			<input style="background-color:white; height:17px"; type="text" name="namasis" value="<?php echo "$namasis"; ?>" />
			<input style="background-color:Yellow; height:20px; width:120px;" type="submit" name="find2" value="Find" >
		</JUDUL3>
	</FORM>	
</body>
</html>
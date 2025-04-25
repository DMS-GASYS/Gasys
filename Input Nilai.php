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
			top: 310px;}			
		TOMBOL{
			position: absolute;
			left:510px;
			top: 250px;}			
		GRID{
			position: absolute;
			left:450px;
			top: 450px;}			
		HASIL{
			position: absolute;
			left:510px;
			top: 360px;}			
		HASIL2{
			position: absolute;
			left:700px;
			top: 370px;}		
		TEST{
			position: absolute;
			left:100px;
			top: 320px;}				
	</style>		

</head>
<body>
    <?php
        include "C:/XAMPP/htdocs/GUNDAR/MENU.php";	
        include "C:/XAMPP/htdocs/GUNDAR/Koneksi.php";	
        include "C:/XAMPP/htdocs/GUNDAR/Fungsi_SQL.php";	
        OPENMENU();
        $noinduk = "";
        $nilai = "";
        
        if(isset($_POST['proses']) or isset($_POST['find'])):
            $_SESSION['pos']=$_POST;
        endif;
        if(isset($_SESSION['pos'])):	
            $noinduk = $_SESSION['pos']['noinduk']; 
            $nilai = $_SESSION['pos']['nilai']; 
        endif;
        if(isset($_POST['find'])):
            $tsql = "SELECT * FROM IDENTITAS WHERE NO_INDUK='$noinduk'";	
            $row=OpenSQL($tsql);
            $noinduk2 = trim($row['NO_INDUK']);
            if ($noinduk2<>""):	
				$tsql = "SELECT * FROM NILAI_SISWA WHERE NO_INDUK='$noinduk'";	
				$row=OpenSQL($tsql);		
                $nilai = $row['NILAI'];
            else:
                echo"<h3><SALAH>DATA TIDAK DITEMUKAN</SALAH></h3>";
            endif;
        endif;
	
        if(isset($_POST['proses'])):
            if($noinduk==""):
                echo"<h3><SALAH>No Induk Belum Diisi</SALAH></h3>";
                GOTO LONCAT;
            endif;
            if($nilai==""):
                echo"<h3><SALAH>NILAI Belum Diisi</SALAH></h3>";
                GOTO LONCAT;
            endif;
            if($nilai>10):
                echo"<h3><SALAH>NILAI KEBESARAN</SALAH></h3>";
                GOTO LONCAT;
            endif;
            if($nilai>7):
                $hasil="LULUS";
            else:
                $hasil="TIDAK LULUS";
            endif;
            $tsql = "SELECT * FROM NILAI_SISWA WHERE NO_INDUK='$noinduk'";	
            $row=OpenSQL($tsql);
            $noinduk2 = trim($row['NO_INDUK']);
            if ($noinduk2==""):
                $tsql = "INSERT INTO NILAI_SISWA(NO_INDUK, NILAI, HASIL) VALUES ('$noinduk','$nilai','$hasil')";	
                mysqli_query($conn, $tsql); 
                echo"<h3><SALAH>SUKSES SIMPAN DATA</SALAH></h3>";
            else:
                $tsql = "UPDATE NILAI_SISWA SET NO_INDUK= '$noinduk', NILAI = '$nilai' , HASIL = '$hasil' WHERE NO_INDUK='$noinduk'";
					mysqli_query($conn, $tsql);
                echo"<h3><SALAH>SUKSES EDIT DATA</SALAH></h3>";
            endif;

            echo"<HASIL>";
                echo"<div style='background-color:#ecf0f1; border: 1px solid #555; height:55px; overflow: auto; padding:10px; width:320px;'>";
                    echo"NO INDUK <br>";
                    echo"NILAI <br>";
                    echo"HASIL <br>";
                echo"</div>";
            echo"</HASIL>";
            echo"<HASIL2>";
                    echo": $noinduk<br>";
                    echo": $nilai<br>";
                    echo": $hasil<br>";
            echo"</HASIL2>";
        endif;
        LONCAT:
    ?>
   <FORM METHOD="POST" NAME="" ACTION="">
		<JUDUL><h1>INPUT NILAI</h1></JUDUL>
		<JUDUL2>
			No induk<br>
			NILAI<br>
		</JUDUL2>
		<JUDUL3>
			<select style="heigh:24px; width:177px;" name="noinduk">
				<option><?php echo "$noinduk"; ?></option>
				<?php
					$tsql = "SELECT * FROM IDENTITAS ORDER BY NO_INDUK";
					$result = mysqli_query($conn, $tsql);
					while($row = mysqli_fetch_array($result)){ 
					echo"<option>$row[NO_INDUK]</option>";}
				?>
			</select>
			<input style="background-color:Yellow; height:20px; width:120px;" type="submit" name="find" value="Find" >	
			<br>		
			<input style="background-color:white; height:17px"; type="text" name="nilai" value="<?php echo "$nilai"; ?>" />
			<br>
		</JUDUL3>
		<TOMBOL>
		<input style="background-color:Yellow; height:50px; width:120px;" type="submit" name="proses" value="Proses" >
		<input style="height:50px; width: 220px;" type="submit" name="cari" value="Kosongkan layar">
		</TOMBOL>
	</FORM>	
        
	<GRID>	
		<table id="myScrollTable" border='1' Width='auto' height='auto' background='#95a5a6'>
		<tbody>		
		<tr>
		<th>NO</th>
		<th>NO INDUK</th>
		<th>NILAI</th>
		<th>HASIL</th>
		</tr>
		<?php
			$NO=0;
			include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";				
			$tsql = "SELECT * FROM NILAI_SISWA ORDER BY NO_INDUK";
			$result = mysqli_query($conn, $tsql);
			while($row = mysqli_fetch_array($result)){ 
				$NO=$NO+1;
				echo "<tr>";
				echo "<td>".$NO."</td>";
				echo "<td>".$row['NO_INDUK']."</td>";
				echo "<td>".$row['NILAI']."</td>";
				echo "<td>".$row['HASIL']."</td>";
				echo "</tr>";}	
				mysqli_close($conn); 
		?>
		</tbody>
		</table>		
		</GRID>	
</body>
</html>
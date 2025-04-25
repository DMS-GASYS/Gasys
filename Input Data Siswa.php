<!DOCTYPE html>
<html lang="en">
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
			top: 400px;}			
		TOMBOL{
			position: absolute;
			left:450px;
			top: 320px;}			
		GRID{
			position: absolute;
			left:450px;
			top: 450px;}			
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
        $kelas = "";
        $kota = "";
        $kelamin = "";
        $cek1 = "";
        $cek2 = "";
        if(isset($_POST['proses']) or isset($_POST['hapus']) or isset($_POST['find'])):
            $_SESSION['pos']=$_POST;
        endif;
        if(isset($_SESSION['pos'])):	
            $noinduk = $_SESSION['pos']['noinduk']; 
            $namasis = $_SESSION['pos']['namasis'];
            $kelas = $_SESSION['pos']['kelas']; 
            $kota = $_SESSION['pos']['kota']; 
        endif;
        if(isset($_POST['find'])):
            $tsql = "SELECT * FROM IDENTITAS WHERE NO_INDUK='$noinduk'";	
            $row=OpenSQL($tsql);
            $noinduk2 = trim($row['NO_INDUK']);
            if ($noinduk2<>""):
                $namasis = trim($row['NAMA_SISWA']);
                $kelas = trim($row['KELAS']);
                $kota = trim($row['KOTA']);
                $kelamin = trim($row['KELAMIN']);
                if($kelamin== "PRIA"):
                    $cek1="checked";
                endif;
                if($kelamin== "WANITA"):
                    $cek2="checked";
                endif;
            else:
                echo"<h3><SALAH>DATA TIDAK DITEMUKAN</SALAH></h3>";
            endif;
        endif;	
        if(isset($_POST['proses'])):
            if($noinduk==""):
                echo"<h3><SALAH>No Induk Belum Diisi</SALAH></h3>";
                GOTO LONCAT;
            endif; 
            if($namasis==""):
                echo"<h3><SALAH>Nama Siswa Belum Diisi</SALAH></h3>";
                GOTO LONCAT;
            endif;
            if($kelas==""):
                echo"<h3><SALAH>Kelas Belum Diisi</SALAH></h3>";
                GOTO LONCAT;
            endif;
            if($kota==""):
                echo"<h3><SALAH>Kota Belum Diisi</SALAH></h3>";
                GOTO LONCAT;
            endif;
            if ($_POST['rad']=="1"):
                $kelamin="PRIA";
                $cek1="checked";
            endif;
            if ($_POST['rad']=="2"):
                $kelamin="WANITA";
                $cek2="checked";
            endif;	
            //=================================================================================	
            $tsql = "SELECT * FROM IDENTITAS WHERE NO_INDUK='$noinduk'";	
            $row=OpenSQL($tsql);
            $noinduk2 = trim($row['NO_INDUK']);
            if ($noinduk2==""):
                $tsql = "INSERT INTO IDENTITAS(NO_INDUK, NAMA_SISWA, KELAS, KOTA, KELAMIN) VALUES ('$noinduk','$namasis','$kelas','$kota','$kelamin')";	
                $tsql = str_replace("--","","$tsql");
                mysqli_query($conn, $tsql); 
                echo"<h3><SALAH>SUKSES SIMPAN DATA</SALAH></h3>";
            else:
                $tsql = "UPDATE IDENTITAS SET NO_INDUK= '$noinduk', NAMA_SISWA = '$namasis', KELAS = '$kelas', KOTA = '$kota', KELAMIN = '$kelamin' WHERE NO_INDUK='$noinduk'";
				mysqli_query($conn, $tsql);
                echo"<h3><SALAH>SUKSES EDIT DATA</SALAH></h3>";
            endif;
        endif;
        LONCAT:
    ?>
   <FORM METHOD="POST" NAME="" ACTION="">
		<JUDUL><h1>INPUT DATA SISWA</h1></JUDUL>
		<JUDUL2>
		No induk<br>
		Nama siswa<br>
		Kelas<br> 
		Kota<br>
		Kelamin<br>
		</JUDUL2>
		<JUDUL3>
		<input style="background-color:white; height:17px"; type="text" name="noinduk" value="<?php echo "$noinduk"; ?>" autofocus/>
		<input style="background-color:Yellow; height:20px; width:120px;" type="submit" name="find" value="Find" >	
		<br>		
		<input style="background-color:white; height:17px"; type="text" name="namasis" value="<?php echo "$namasis"; ?>" />
		<br>
		<input style="background-color:white; height:17px"; type="text" name="kelas" value="<?php echo "$kelas"; ?>" />
		<br>
		<select style="heigh:24px; width:177px;" name="kota">
			<option><?php echo "$kota"; ?></option>
			<option> Jakarta </option>
			<option> Bogor </option>
			<option> Papua </option>
			<option> Sulawesi </option>
			<option> Bekasi </option>
			<option> Bandung </option>
			<option> Depok </option>
		</select>
		<br>
		<input type="radio" name="rad" id="rad1" value="1" class="rad" <?php echo"$cek1"?> />PRIA &nbsp &nbsp 
		<input type="radio" name="rad" id="rad2" value="2" class="rad" <?php echo"$cek2"?> /> WANITA &nbsp &nbsp 			
		<br><br>
		</JUDUL3>
		<TOMBOL>
		<input style="background-color:Yellow; height:50px; width:120px;" type="submit" name="proses" value="Simpan" >
		<input style="height:50px; width: 220px;" type="submit" name="cari" value="Kosongkan layar">
		<input style="background-color:Yellow; height:50px; width:120px;" type="submit" name="hapus" value="Hapus" >
		<br><br>
		</TOMBOL>
	</FORM>	
        
	<GRID>	
		<table id="myScrollTable" border='1' Width='auto' height='auto' background='#95a5a6'>
		<tbody>		
		<tr>
		<th>NO</th>
		<th>NO INDUK</th>
		<th>NAMA SISWA</th>
		<th>KELAS</th>
		<th>KOTA</th>	
		<th>KELAMIN</th>
	
		</tr>
		<?php
			$NO=0;
			include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";				
			$tsql = "SELECT * FROM IDENTITAS ORDER BY NAMA_SISWA";
			$result = mysqli_query($conn, $tsql);
			while($row = mysqli_fetch_array($result)){ 
				$NO=$NO+1;
				echo "<tr>";
				echo "<td>".$NO."</td>";
				echo "<td>".$row['NO_INDUK']."</td>";
				echo "<td>".$row['NAMA_SISWA']."</td>";
				echo "<td>".$row['KELAS']."</td>";		
				echo "<td><center>".$row['KOTA']."</center></td>";
				echo "<td>".$row['KELAMIN']."</td>";
				echo "</tr>";}	
				mysqli_close($conn); 
		?>
		</tbody>
		</table>		
		</GRID>	
</body>
</html>
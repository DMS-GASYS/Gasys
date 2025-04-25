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
		JUDUL4{
			position: absolute;
			left:450px;
			top: 500px;}		
		SALAH{
			position: absolute;
			color: red;
			left:600px;
			top: 250px;}			
		TOMBOL{
			position: absolute;
			left:510px;
			top: 250px;}			
		GRID{
			position: absolute;
			left:450px;
			top: 300px;}					
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
        //=====================================================================
        if(isset($_POST['find1'])):
            $tsql = "SELECT * FROM IDENTITAS WHERE NO_INDUK='$noinduk'";	
            $row=OpenSQL($tsql);
            $noinduk2 = trim($row['NO_INDUK']);
            if ($noinduk2<>""):
                $namasis = trim($row['NAMA_SISWA']);
            else:
                echo"<h3><SALAH>DATA TIDAK DITEMUKAN</SALAH></h3>";
            endif;
        endif;
        if(isset($_POST['find2'])):
            $tsql = "SELECT * FROM IDENTITAS WHERE NAMA_SISWA='$namasis'";	
            $row=OpenSQL($tsql);
            $namasis = trim($row['NAMA_SISWA']);
            if ($namasis<>""):
                $noinduk = trim($row['NO_INDUK']);
            else:
                echo"<h3><SALAH>DATA TIDAK DITEMUKAN</SALAH></h3>";
            endif;
        endif;

        LONCAT:
    ?>
   <FORM METHOD="POST" NAME="" ACTION="">
				<JUDUL><h1>LAPORAN DATA SISWA</h1></JUDUL>
				<JUDUL2>
                    No induk<br>
                    Nama Siswa<br>
                </JUDUL2>
                <JUDUL3>
                    <input style="background-color:white; height:17px"; type="text" name="noinduk" value="<?php echo "$noinduk"; ?>" />
                    <input style="background-color:Yellow; height:20px; width:120px;" type="submit" name="find1" value="Find" >
                    <br>
                    <input style="background-color:white; height:17px"; type="text" name="namasis" value="<?php echo "$namasis"; ?>" />
                    <input style="background-color:Yellow; height:20px; width:120px;" type="submit" name="find2" value="Find" >
                    <br>
                </JUDUL3>
                <JUDUL4>
                    <input style="background-color:Yellow; height:20px; width:150px;" type="submit" name="tampilsemua" value="TAMPILKAN DATA" >
                </JUDUL4>

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
            <th>NILAI</th>
			<th>HASIL</th>
		
		
			</tr>
			<?php
				$NO=0;
				$tsql="";
				include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";	
                if(isset($_POST['find1'])):			
				    $tsql = "SELECT * FROM IDENTITAS WHERE NO_INDUK = '$noinduk' ORDER BY NO_INDUK";
                endif;
                if(isset($_POST['find2'])):			
				    $tsql = "SELECT * FROM IDENTITAS WHERE NAMA_SISWA = '$namasis' ORDER BY NAMA_SISWA";
                endif;
                if(isset($_POST['tampilsemua'])):			
				    $tsql = "SELECT * FROM IDENTITAS ORDER BY NAMA_SISWA";
                endif;
				if ($tsql<>""):
					$result = mysqli_query($conn, $tsql);
					while($row = mysqli_fetch_array($result)){                    
						$noinduk3 = $row['NO_INDUK'];
						$tsql2 = "SELECT * FROM NILAI_SISWA WHERE NO_INDUK='$noinduk3'";	
						$row2=OpenSQL($tsql2);    
						$NO=$NO+1;
						echo "<tr>";
						echo "<td>".$NO."</td>";
						echo "<td>".$row['NO_INDUK']."</td>";
						echo "<td>".$row['NAMA_SISWA']."</td>";
						echo "<td>".$row['KELAS']."</td>";
						echo "<td>".$row['KOTA']."</td>";
						echo "<td>".$row['KELAMIN']."</td>";
						echo "<td>".$row2['NILAI']."</td>";
						echo "<td>".$row2['HASIL']."</td>";
						echo "</tr>";}	
						mysqli_close($conn); 
				endif;
			?>
			</tbody>
			</table>		
			</GRID>	
</body>
</html>
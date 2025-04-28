<!DOCTYPE html>
<html lang="en">
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
		OK{
			position: absolute;
			left:600px;
			top: 253px;}
		OK2{
			position: absolute;
			left:600px;
			top: 350px;}
		SALAH{
			position: absolute;
			color: red;
			left:530px;
			top: 300px;}		
		SALAH2{
			position: absolute;
			color: red;
			left:640px;
			top: 300px;}			
		TOMBOL{
			position: absolute;
			left:510px;
			top: 250px;}	
		TEST{
			position: absolute;
			left:100px;
			top: 250px;}			
	</style>		
</head>

<body style="height:1500px">
    <?php
    include "C:/XAMPP/htdocs/GUNDAR/Koneksi.php";	
    include "C:/XAMPP/htdocs/GUNDAR/Fungsi_SQL.php";	
    $success = "";
    $username = "";
    $pass = "";
    if(isset($_POST['enter'])):
        $_SESSION['pos']=$_POST;
    endif;
    if(isset($_SESSION['pos'])):	
        $username = $_SESSION['pos']['username']; 
        $pass = $_SESSION['pos']['pass']; 
    endif;
    if(isset($_POST['enter'])):
        $tsql = "SELECT * FROM LOGIN_USER WHERE USERNAME='$username' AND SANDI='$pass'";	
        $row=OpenSQL($tsql);
        $username2 = trim($row['USERNAME']);
        if ($username2==""):  
            $success = "salah";
            echo"<h3><SALAH>USERNAME ATAU PASSWORD SALAH</SALAH></h3>";
        else:
            $success = "benar";
            echo"<h3><SALAH2>BERHASIL</SALAH2></h3>";
        endif; 
    endif;
    ?>

	<FORM METHOD="POST" NAME="" ACTION="">
		<JUDUL><h1>SISTEM DATA SISWA</h1></JUDUL>
		<JUDUL2>
			USERNAME<br> <br>
			PASSWORD<br>
		</JUDUL2>
		<JUDUL3>
			<input style="background-color:white; height:17px"; type="text" name="username" value="<?php echo "$username"; ?>" required autofocus />
			<br> <br>
			<input style="background-color:white; height:17px"; type="password" name="pass" value="<?php echo "$pass"; ?>" />
		</JUDUL3>
		<OK>
			<input style="background-color:Yellow; height:20px; width:177px;" type="submit" name="enter" value="ENTER" >
		</OK>
	</FORM>	
    <OK>
        <?php if($success == 'salah') : ?>
            <button onclick="JavaScript:window.open('http://localhost/gundar/Index.php','_self')">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp CLEAR &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</button><br />
        <?php endif; ?>
    </OK>
    <OK>
        <?php if($success == 'benar') : ?>
            <button onclick="JavaScript:window.open('http://localhost/gundar/Home.php','_self')">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp LANJUTKAN &nbsp &nbsp &nbsp &nbsp &nbsp</button><br />	
        <?php endif; ?>
    </OK>	
</body>
</html>


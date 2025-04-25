<!DOCTYPE html>
<html lang="en">
    <head>
        <title>GUNDAR</title>
		<link rel="stylesheet" href="SUPPORT/MENU.css" />
            <style>	
                body{background: #ecf0f1;}			
                LOGO2{
                    position: absolute;
                    left:400px;
                    top: 100px;}						
            </style>		
    </head>
    <body>
        <?php
            Function OPENMENU()
            {
        ?>
    <nav class="navbar">
		<ul class="navbar-list">
			<li class="navbar-item"><a href="Home.php">Home &nbsp &nbsp </a></li>
			<li class="navbar-item"><a href="Sales.php">Sales &nbsp &nbsp </a></li>
			<li class="navbar-item dropdown">
				<a>Service &nbsp &nbsp </a>
				<div class="dropdown-content">
					<a href="Input Data Siswa.php">Input Data Siswa</a>
					<a href="Input Nilai.php">Input Data Nilai</a>
				</div>
			</li>
			<li class="navbar-item dropdown">
				<a>Report &nbsp &nbsp </a>
				<div class="dropdown-content">
					<a href="Laporan Data Siswa.php">Laporan Data Siswa</a>
					<a href="Cek Kelulusan.php">Cek Kelulusan Siswa</a>
				</div>
			</li>
            <li class="navbar-item"><a href="index.php">Log Out &nbsp &nbsp </a></li>
		</ul>
	</nav>
        <?php
            }
        ?>	
    </body>    			
</html>    
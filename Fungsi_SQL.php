<?php	
	//================================================================
	//                        OPEN BARIS							//
	//================================================================
	Function OpenBRS($sql)
	{include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$brs = $row['X'];	
	mysqli_close($conn);
	return $brs;}

	//================================================================
	//                        OPEN BARIS 2							//
	//================================================================
	Function OpenBRS2($sql)
	{include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	$params2 = array();
	$options2 =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );			
	$result2 = mysqli_query($conn, $sql, $params2, $options2);			
	$brs2=mysqli_num_rows($result2);	
	mysqli_close($conn); 
	return $brs2;}
	
	//================================================================
	//                          OPEN SQL  							//
	//================================================================	
	Function OpenSQL($sql)
	{include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	mysqli_close($conn);
	return $row;}		
	
	//================================================================
	//                          OPEN SQL 2 							//
	//================================================================	
	Function OpenSQL2($sql)
	{include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	$result2 = mysqli_query($conn, $sql);
	$row2 = mysqli_fetch_array($result2);
	mysqli_close($conn);
	return $row2;}		

	//================================================================
	//                         GET NO SALES							//
	//================================================================	
	Function GetNoSales($key,$dlr)
	{include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	$sql = "SELECT * FROM GIM WHERE DEALER_CODE='$dlr'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$doc=$row['CUSTOMER_IDCODE'];	
	//--------------------------------------------
	$so="";
	$key=strtoupper($key);
	$sql = "SELECT * FROM Z_GIM WHERE DEALER_CODE='$dlr'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$so=$row[$key]+1;
	$sql = "UPDATE Z_GIM SET $key='$so' WHERE DEALER_CODE='$dlr'";
	$result = mysqli_query($conn, $sql); 
	//--------------------------------------------
	$so = sprintf("%06d", $so);
	$so="$doc$so";	
	$so=str_replace(" ","",trim(strtoupper($so))); 
	$tsql="SELECT $key FROM Z_PROGRESS WHERE DEALER_CODE='$dlr' AND $key='$so'";
	$brs=OpenBRS($tsql);
	mysqli_close($conn);
	if ($brs>0) {echo "<script>alert('Failed..!  Duplicate $key : $so.  Please contact your IT');</script>";exit;}	
	return $so;}	

	//================================================================
	//                           GET NO DEPOSIT 					//
	//================================================================	
	Function GetNoDeposit($key)
	{include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	$key=strtoupper($key);
	$sql = "SELECT * FROM Z_CUSTOMER_DEPOSIT_MASTER";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$doc="HO-";	
	$so=$row[$key]+1;
	if($so==1) {$sql = "INSERT INTO Z_CUSTOMER_DEPOSIT_MASTER(DEPOSIT_NO) VALUES('$so')";}
	if($so>1) {$sql = "UPDATE Z_CUSTOMER_DEPOSIT_MASTER SET $key='$so'";}
	$result = mysqli_query($conn, $sql); 
	//--------------------------------------------
	$so = sprintf("%07d", $so);
	$so="$doc$so";	
	$so=str_replace(" ","",trim(strtoupper($so))); 
	$tsql="SELECT $key FROM Z_CUSTOMER_DEPOSIT_MASTER WHERE $key='$so'";
	$brs=OpenBRS($tsql);
	mysqli_close($conn);
	if ($brs>0) {echo "<script>alert('Duplicate $key : $so ....!');</script>";exit;}	
	return $so;}
	
	//================================================================
	//                           GET NO 							//
	//================================================================	
	Function GetNo($key,$dlr)
	{include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	$so="";
	$key=strtoupper($key);
	$sql = "SELECT * FROM GIM WHERE DEALER_CODE='$dlr'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$doc=$row['CUSTOMER_IDCODE'];
	$so=$row[$key]+1;
	$sql = "UPDATE GIM SET $key='$so' WHERE DEALER_CODE='$dlr'";
	$result = mysqli_query($conn, $sql); 
	//--------------------------------------------
	$so = sprintf("%06d", $so);
	$so="$doc$so";	
	$so=str_replace(" ","",trim(strtoupper($so))); 
	$tsql="SELECT $key FROM PROGRESS WHERE DEALER_CODE='$dlr' AND $key='$so'";
	$brs=OpenBRS($tsql);
	mysqli_close($conn);
	if ($brs>0) {echo "<script>alert('Duplicate $key : $so ....!');</script>";exit;}	
	return $so;}
	
	//================================================================
	//                          GET NO BOOKING						//
	//================================================================	
	Function GetNoBooking($key,$dlr)
	{include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	$so="";
	$key=strtoupper($key);
	$sql = "SELECT * FROM GIM WHERE DEALER_CODE='$dlr'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$doc=$row['CUSTOMER_IDCODE'];
	$so=$row[$key]+1;
	$sql = "UPDATE GIM SET $key='$so' WHERE DEALER_CODE='$dlr'";
	$result = mysqli_query($conn, $sql); 
	//--------------------------------------------
	$so = sprintf("%06d", $so);
	$so="$doc$so";	
	$so=str_replace(" ","",trim(strtoupper($so))); 
	$tsql="SELECT $key FROM BOOKING WHERE DEALER_CODE='$dlr' AND $key='$so'";
	$brs=OpenBRS($tsql);
	mysqli_close($conn);
	if ($brs>0) {echo "<script>alert('Duplicate $key : $so ....!');</script>";exit;}	
	return $so;}
	
	//================================================================
	//                           GET NO 2							//
	//================================================================	
	Function GetNo2($key,$dlr)
	{include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	$so="";
	$key=strtoupper($key);
	$sql = "SELECT * FROM GIM WHERE DEALER_CODE='$dlr'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$doc=$row['CUSTOMER_IDCODE'];
	$so=$row[$key]+1;
	$sql = "UPDATE GIM SET $key='$so' WHERE DEALER_CODE='$dlr'";
	$result = mysqli_query($conn, $sql); 
	return $so;}
	
	//================================================================
	//                            GET ID							//
	//================================================================	
	Function GetID($dlr)
	{include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	$sql = "SELECT * FROM GIM WHERE DEALER_CODE='$dlr'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$code=$row['CUSTOMER_IDCODE'];
	$cust_id=$row['CUSTOMER_ID']+1;
	$cust_id2=$row['CUSTOMER_ID']+1;
	$cust_id = sprintf("%06d", $cust_id);	
	$customer_id="$code$cust_id";
	$customer_id=str_replace(" ","",trim(strtoupper($customer_id))); 
	//--------------------------------------------
	$cust_id=trim($cust_id,'0');		
	$sql = "UPDATE GIM SET CUSTOMER_ID='$cust_id2' WHERE DEALER_CODE='$dlr'";
	$result = mysqli_query($conn, $sql); 
	//--------------------------------------------
	$tsql="SELECT CUSTOMER_ID FROM CUSTOMER WHERE CUSTOMER_ID='$customer_id'";
	$brs=OpenBRS($tsql);
	mysqli_close($conn);
	if ($brs>0) {echo "<script>alert('Failed..!  Duplikasi Customer ID = $customer_id. Please contact your IT');</script>";exit;}	
	return $customer_id;}	
	
	//================================================================
	//                            GET PICK NO						//
	//================================================================	
	Function Getpick_no($kode,$dlr)
	{include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	$sql = "SELECT * FROM GIM WHERE DEALER_CODE='$dlr'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$doc=$row['CUSTOMER_IDCODE'];
	$pick=$row['PICK_NO']+1;
	$sql = "UPDATE GIM SET PICK_NO='$pick' WHERE DEALER_CODE='$dlr'";
	mysqli_query($conn, $sql); 			
	//--------------------------------------------
	$pick = sprintf("%06d", $pick);
	$pick="$doc"."$kode"."$pick";	
	$pick=str_replace(" ","",trim(strtoupper($pick))); 
	$tsql="SELECT PICK_NO FROM PART_ORDER WHERE DEALER_CODE='$dlr' AND PICK_NO='$pick'";
	$brs=OpenBRS($tsql);
	mysqli_close($conn);
	if ($brs>0) {echo "<script>alert('Duplicate Pick_No : $pick ....!');</script>";$pick="";exit;}	
	return $pick;}
		
	//================================================================
	//                         GET DISCOUNT							//
	//================================================================	
	Function GetDisc($key,$dlr)
	{date_default_timezone_set("Asia/Jakarta");
	$tanggal=date('Y/m/d');	
	$product_code="";
	$valid="";
	$hasil=0;
	$hasil2=0;
	include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";	
	$tsql = "SELECT CONVERT(VARCHAR(30),DISC_VALID,111) AS DISC_VALID,DISC_RATE,PRODUCT_CODE FROM PART_STOCK WHERE DEALER_CODE='$dlr' AND PART_NO='$key'";	
	$result = mysqli_query($conn, $tsql);
	while($row = mysqli_fetch_array($result))
	{$hasil=$row['DISC_RATE'];
	$valid=$row['DISC_VALID'];
	$product_code=trim($row['PRODUCT_CODE']);}
	if ($valid<$tanggal) {$hasil=0;}
	//--------------------------------------------
	$tsql = "SELECT CONVERT(VARCHAR(30),VALID_DATE,111) AS VALID_DATE,DISCOUNT FROM DISCPRODUCT WHERE DEALER_CODE='$dlr' AND PRODUCT_CODE='$product_code'";	
	$result = mysqli_query($conn, $tsql);
	while($row = mysqli_fetch_array($result))
	{$hasil2=$row['DISCOUNT'];
	$valid=$row['VALID_DATE'];}
	if ($valid<$tanggal) {$hasil2=0;}
	$hasil=$hasil+$hasil2;
	mysqli_close($conn);
	return $hasil;}	
			
	//================================================================
	//                        GET TOTAL PRICE						//
	//================================================================			
	Function GetTotal($so,$dlr)	
	{$dp		= 0;
	$totrate	= 0;
	$totrate_tech=0;
	$labor		= 0;
	$part		= 0;
	$part2		= 0;
	$sublet		= 0;
	$discount	= 0;
	$ppn		= 0;
	$meterai	= 0;	
	$varsubtot	= 0;
	$vargrandtot= 0;
	$vartotal	= 0;
	$cust_type	= '';
	$sts		= '';
	$ip_num = $_SERVER['REMOTE_ADDR'];
	if ($ip_num=="::1") {$ip_num="SERVER";}		
	$file = fopen("C:\windows\GUNDAR\\$ip_num.txt","rb");
	$line_of_text = fgets($file);
	$parts = explode(':', $line_of_text);
	$dlr= trim($dlr);
	//====================== DOWN_PAYMENT =====================
	include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	$tsql = "SELECT * FROM DOWN_PAYMENT WHERE DEALER_CODE='$dlr' AND SERVICE_ORDER='$so'";	
	$result = mysqli_query($conn, $tsql);
	while($row = mysqli_fetch_array($result))
	{$dp=$dp + $row['TOTAL_DP'];}
	//====================== JOB_ORDER =====================
	include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	$tsql = "SELECT * FROM JOB_ORDER WHERE DEALER_CODE='$dlr' AND SERVICE_ORDER='$so'";	
	$result = mysqli_query($conn, $tsql);
	while($row = mysqli_fetch_array($result))
	{$totrate=$totrate + $row['RATE'];
	$totrate_tech=$totrate_tech + $row['RATE_TECH'];
	$labor=$labor + ($row['RATE']*$row['LABOR_HOUR']);}	
	//====================== SUBLET_ORDER =====================
	$tsql = "SELECT * FROM SUBLET_ORDER WHERE DEALER_CODE='$dlr' AND SERVICE_ORDER='$so'";	
	$result = mysqli_query($conn, $tsql);
	while($row = mysqli_fetch_array($result))
	{$sublet=$sublet + $row['PRICE'];}
	//====================== PART_ORDER =====================
	$tsql = "SELECT * FROM PART_ORDER WHERE DEALER_CODE='$dlr' AND SERVICE_ORDER='$so'";	
	$result = mysqli_query($conn, $tsql);
	while($row = mysqli_fetch_array($result))
	{$discount=$row['PRICE']-(($row['PRICE']*$row['DISC_RATE'])/100);
	$part=$part + ($row['AVAILABLE']*$discount);
	$part2=$part2 + ($row['QTY']*$discount);}		
	$part2=round($part2);
	//========================= PPN =========================
	$sql = "SELECT PPN FROM GIM WHERE DEALER_CODE='$dlr'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$xppn=$row['PPN'];
	//======================= DISCOUNT ======================
	$tsql = "SELECT * FROM PROGRESS WHERE DEALER_CODE='$dlr' AND SERVICE_ORDER='$so' AND STATUS<>'CN'";	
	$result = mysqli_query($conn, $tsql);
	while($row = mysqli_fetch_array($result))
	{$sts=$row['STATUS'];
	 if ($sts=="20") {$part=$part2;}
	 $cust_type=$row['CUSTOMER_TYPE'];
	 $discA = ($row['DISC_SERVICE']*$labor) / 100;
	 $discB = ($row['DISC_PART']*$part) / 100;
	 $discC = ($row['DISC_SUBLET']*$sublet) / 100;
	 $vartotal = Round($discA + $discB + $discC);
	 $varsubtot = ($labor + $part + $sublet) - $vartotal;
	 $ppn = Round(($varsubtot * $xppn) / 100);
	//----------------------------------------------------------------------	 
	$tsql2 = "SELECT * FROM PPN_LOG WHERE DEALER_CODE='$dlr' AND SERVICE_ORDER='$so'";					
	$params = array();
	$options =  array( "Scrollable" => mysqli_CURSOR_KEYSET );				
	$result2 = mysqli_query($conn, $tsql2, $params, $options);
	$row2 = mysqli_fetch_array($result2);
	$brs2 = mysqli_num_rows($result2); 
	if ($brs2>0):
		if ($row2['PPN_CODE']=="0") {$ppn=0;}	 
	endif;
	//----------------------------------------------------------------------
	 $vargrandtot = $varsubtot + $ppn;}
	 //----------------------------------------------------------------------
	$tsql = "SELECT * FROM GIM WHERE DEALER_CODE='$dlr'";	
	$result = mysqli_query($conn, $tsql);
	$row = mysqli_fetch_array($result);
	if ($vargrandtot>=$row['METERAI_BWH'] and $vargrandtot<$row['METERAI_ATS']) {$meterai=$row['METERAI1'];}
	if ($vargrandtot>=$row['METERAI_ATS']) {$meterai=$row['METERAI2'];}
	if ($brs2>0):
		if ($row2['METERAI_CODE']=="0") {$meterai=0;}	 
	endif;	
	//----------------------------------------------------------------------
     If ($cust_type== "INT") {$meterai=0;}	 
	 $vargrandtot = $varsubtot + $ppn + $meterai;
	//=================== UPDATE PROGRESS ===================
	$tsql = "UPDATE PROGRESS SET 
	RATE='$totrate', 
	RATE_TECH='$totrate_tech', 
	LABOR='$labor',
	SUBLET='$sublet',
	PART='$part',
	DISCOUNT='$vartotal',
	PPN='$ppn',
	METERAI='$meterai',
	TOTAL='$vargrandtot'
	WHERE DEALER_CODE='$dlr' AND SERVICE_ORDER='$so' AND STATUS<>'CN'";	
	$tsql = str_replace("--","","$tsql");
	$result = mysqli_query($conn, $tsql); 				
	mysqli_close($conn); 
	//echo "PART : $part<br>";	
	//echo "SUBLET : $sublet<br>";
	//echo "LABOR : $labor<br>";
	//echo "DP : $dp<br>"; 
	//echo "DISCOUNT : $vartotal<br>"; 
	//echo "SUB TOTAL : $varsubtot<br>"; 
	//echo "PPN : $ppn<br>"; 
	//echo "METERAI : $meterai<br>"; 
	//echo "GRAND TOTAL : $vargrandtot<br>";
	}	
	
	//================================================================
	//                       GET PART PRICE All						//
	//================================================================
	Function GetPartPriceAll($so,$dlr)
	{$price	=0;
	$disc	=0;
	$discountl=0;
	$total	=0;
	$sts	="";
	$twc	="";
	//-----------------------------------------------------------------
	include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	$tsql = "SELECT STATUS,CUSTOMER_TYPE,TWC_TYPE FROM PROGRESS WHERE DEALER_CODE='$dlr' AND SERVICE_ORDER='$so'";	
	$result = mysqli_query($conn, $tsql);
	$row = mysqli_fetch_array($result);
	$type=trim($row['CUSTOMER_TYPE']); 
	$sts=$row['STATUS']; 
	$twc=trim($row['TWC_TYPE']); 
	//-----------------------------------------------------------------
	$tsql = "SELECT * FROM PART_ORDER WHERE DEALER_CODE='$dlr' AND SERVICE_ORDER='$so'";	
	$result = mysqli_query($conn, $tsql);
	while($row = mysqli_fetch_array($result))				
		{$part_no=trim($row['PART_NO']);
		$tsql2 = "SELECT * FROM PART_STOCK WHERE DEALER_CODE='$dlr' AND PART_NO='$part_no'";	
		$result2 = mysqli_query($conn, $tsql2);
		$row2 = mysqli_fetch_array($result2);
		$price=$row2['PRICE'];
		$disc=GetDisc($part_no,$dlr);
		$discount=round($price - ($price * ($disc / 100)));
		if ($type=="INT" AND $twc<>"WAR"):
			$price=$row2['LANDED_COST'];
			$disc=0;
			$discount=round($price - ($price * ($disc / 100)));
		endif;				
		if ($twc<>""):			
			$tsql2 = "SELECT RATE_PART FROM WARRANTY WHERE CODE_JOB='$twc'";	
			$row2=OpenSQL($tsql2);							
			$war_rate=$row2['RATE_PART']/100;						
			if ($row2['RATE_PART']<100):						
				$pricex=round($price * $war_rate);	
				$price=$pricex;				
				$discount=round($pricex-(($price * $row['DISC_RATE'])/100));									
			endif;
		endif;						
		if($sts=="20") {$total = Round($row['QTY'] * $discount);}
		if($sts<>"20") {$total = Round($row['AVAILABLE'] * $discount);}
		$tsql3 = "UPDATE PART_ORDER SET 
		PRICE='$price',
		DISC_RATE='$disc',
		DISCOUNT='$discount',
		TOTAL='$total'
		WHERE DEALER_CODE='$dlr' AND SERVICE_ORDER='$so' AND PART_NO='$part_no' AND (INVOICE_NO IS NULL OR INVOICE_NO='')";
		$tsql3 = str_replace("--","","$tsql3");
		mysqli_query($conn, $tsql3);}		
		mysqli_close($conn);} 		
		

	//================================================================
	//                        GET PART PRICE 						//
	//================================================================
	Function GetPartPrice($so,$part_no,$dlr)
	{$price	=0;
	$available=0;
	$qty=0;
	$disc	=0;
	$discountl=0;
	$total	=0;
	$sts	="";	
	$twc	="";
	//-----------------------------------------------------------------
	include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	$tsql = "SELECT STATUS,CUSTOMER_TYPE,TWC_TYPE FROM PROGRESS WHERE DEALER_CODE='$dlr' AND SERVICE_ORDER='$so'";	
	$result = mysqli_query($conn, $tsql);
	$row = mysqli_fetch_array($result);
	$type=trim($row['CUSTOMER_TYPE']); 
	$sts=$row['STATUS']; 
	$twc=trim($row['TWC_TYPE']); 
	//-----------------------------------------------------------------
	$tsql = "SELECT * FROM PART_ORDER WHERE DEALER_CODE='$dlr' AND SERVICE_ORDER='$so' AND PART_NO='$part_no'";	
	$result = mysqli_query($conn, $tsql);
	$row = mysqli_fetch_array($result);	
	$qty=$row['QTY'];
	$available=$row['AVAILABLE'];
	//-----------------------------------------------------------------
	$tsql2 = "SELECT PRICE,LANDED_COST,DISC_RATE FROM PART_STOCK WHERE DEALER_CODE='$dlr' AND PART_NO='$part_no'";	
	$result2 = mysqli_query($conn, $tsql2);
	$row2 = mysqli_fetch_array($result2);
	$price=$row2['PRICE'];
	$disc=GetDisc($part_no,$dlr);
	$discount=round($price - ($price * ($disc / 100)));	
	if ($type=="INT" AND $twc<>"WAR"):
		$price=$row2['LANDED_COST'];
		$disc=0;
		$discount=round($price - ($price * ($disc / 100)));
	endif;
	if ($twc<>""):			
		$tsql2 = "SELECT RATE_PART FROM WARRANTY WHERE CODE_JOB='$twc'";	
		$row2=OpenSQL($tsql2);							
		$war_rate=$row2['RATE_PART']/100;						
		if ($row2['RATE_PART']<100):						
			$pricex=round($price * $war_rate);	
			$price=$pricex;				
			$discount=round($pricex-(($price * $row['DISC_RATE'])/100));									
		endif;
	endif;			
	if($sts=="20") {$total = Round($qty * $discount);}
	if($sts<>"20") {$total = Round($available * $discount);}	
	$tsql3 = "UPDATE PART_ORDER SET 
	PRICE='$price',
	DISC_RATE='$disc',
	DISCOUNT='$discount',
	TOTAL='$total'
	WHERE SERVICE_ORDER='$so' AND PART_NO='$part_no' AND (INVOICE_NO IS NULL OR INVOICE_NO='')";
	$tsql3 = str_replace("--","","$tsql3");
	mysqli_query($conn, $tsql3);		
	mysqli_close($conn);} 			
		
	//================================================================
	//                           GET STOCK							//
	//================================================================	
	Function GetStock($pn,$dlr)
	{$stock=0;
	include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";	
	$sql = "SELECT STOCK FROM PART_STOCK WHERE DEALER_CODE='$dlr' AND PART_NO='$pn'";	
	$result2 = mysqli_query($conn, $sql);
	while($row2 = mysqli_fetch_array($result2))
	{$stock=$row2['STOCK'];}
	if ($stock=="") {$stock=0;}
	return $stock;}
		
	//================================================================
	//                            FORMAT RP						    //
	//================================================================
	Function FormatRP($angka)
	{$jadi = "" . number_format($angka,0,',',',')."";
	return $jadi;}
	
	//================================================================
	//                            FORMAT DP1						    //
	//================================================================	
	Function FormatDP1($angka)
	{$jadi = "" . number_format($angka,1)."";
	return $jadi;}	
	
	//================================================================
	//                            FORMAT DP						    //
	//================================================================	
	Function FormatDP($angka)
	{$jadi = "" . number_format($angka,2)."";
	return $jadi;}	
	
	//================================================================
	//                        FORMAT HAPUS KOMA						 //
	//================================================================	
	Function FormatK($angka)
	{$jadi=str_replace(",","","$angka");
	return $jadi;}			
	
	//================================================================
	//                        SIMPAN MUTASI 						 //
	//================================================================	
	Function Simpan_Mutasi($trans_no,$pn,$code,$qty,$dlr,$user)
	{date_default_timezone_set("Asia/Jakarta");
	$tanggal=date('m-d-Y');
	$jam=date("H:i:s");		
	//-----------------------------------------------------------------		
	$supply=$qty;
	include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";	
	$stock=0;
	$tsql = "SELECT FRANC,PART_NAME,STOCK FROM PART_STOCK WHERE DEALER_CODE='$dlr' AND PART_NO='$pn'";	
	$row=OpenSQL($tsql);
	$stock = $row['STOCK'];	
	if ($code=="S"):
		$supply = $row['STOCK'];		
		if ($supply>$qty) {$supply = $qty;}
	endif;
	$franc = trim($row['FRANC']);	
	$part_name = trim($row['PART_NAME']);		
	if ($code=="O" and $stock==$qty) {$desc="ADJUSTMENT";}
	if ($code=="O" and $stock<$qty) {$desc="ADJUSTMENT PLUS";}
	if ($code=="O" and $stock>$qty) {$desc="ADJUSTMENT MINUS";}
	if ($code=="S") {$desc="SALES";}	
	if ($code=="R") {$desc="PURCHASE";}	
	if ($code=="C") {$desc="RETURN TO SUPPLIER";}
	if ($code=="X") {$desc="RETURN TO WAREHOUSE";}		
	if ($code=="K") {$desc="TRANSFER-OUT";}		
	if ($code=="L") {$desc="TRANSFER-OUT-CANCEL";}	
	if ($code=="M") {$desc="TRANSFER-IN";}
    $tsql = "INSERT INTO PART_MUTASI(DEALER_CODE,TRANS_DATE,TRANS_TIME,PROCESS_CODE,FRANC,PART_NO,PART_NAME,STOCK,QTY,USER_ID,DESCRIPTION,TRANS_NO,SYSTEM_CODE)
	VALUES('$dlr','$tanggal','$jam','$code','$franc','$pn','$part_name','$stock','$supply','$user','$desc','$trans_no','WEB')";	
	mysqli_query($conn, $tsql);						
	}	
	
	//================================================================
	//                        Tanggal Indonesia						 //
	//================================================================	
	Function Getformattgl()
	{$tgl=date('d');
	$bln=date('m');
	$thn=date('Y');
	if ($bln=="01") {$bln="Januari";}
	if ($bln=="02") {$bln="Februari";}
	if ($bln=="03") {$bln="Maret";}
	if ($bln=="04") {$bln="April";}
	if ($bln=="05") {$bln="Mei";}
	if ($bln=="06") {$bln="Juni";}
	if ($bln=="07") {$bln="Juli";}
	if ($bln=="08") {$bln="Agustus";}
	if ($bln=="09") {$bln="September";}
	if ($bln=="10") {$bln="Oktober";}
	if ($bln=="11") {$bln="November";}
	if ($bln=="12") {$bln="Desember";}
	$tanggal="$tgl $bln $thn";
	return $tanggal;}		
	
	//================================================================
	//                        LOG HISTORY SERVICE					//
	//================================================================	
	Function GetLogService($dlr,$inisial,$so,$action)
	{date_default_timezone_set("Asia/Jakarta");
	$tanggal=date('m/d/Y');
	$jam=date("H:i:s");
	include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";	
	$tsql = "INSERT INTO LOG_PROCESS(DEALER_CODE,SERVICE_ORDER,ACTION,USER_ID,TRANS_DATE,TRANS_TIME)
	VALUES('$dlr','$so','$action','$inisial','$tanggal','$jam')";			
	mysqli_query($conn, $tsql);}
	
	//================================================================
	//                        LOG HISTORY SERVICE 2					//
	//================================================================	
	Function GetLogService2($dlr,$inisial,$so,$remark,$action)
	{date_default_timezone_set("Asia/Jakarta");
	$tanggal=date('m/d/Y');
	$jam=date("H:i:s");
	include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";	
	$tsql = "INSERT INTO LOG_PROCESS(DEALER_CODE,SERVICE_ORDER,ACTION,REMARK,USER_ID,TRANS_DATE,TRANS_TIME)
	VALUES('$dlr','$so','$action','$remark','$inisial','$tanggal','$jam')";			
	mysqli_query($conn, $tsql);}
	
	//================================================================
	//                         LOG HISTORY SALES					//
	//================================================================	
	Function GetLogSales($dlr,$inisial,$sales_no,$action)
	{date_default_timezone_set("Asia/Jakarta");
	$tanggal=date('m/d/Y');
	$jam=date("H:i:s");
	include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";	
	$tsql = "INSERT INTO Z_LOG_PROCESS(DEALER_CODE,SALES_NO,ACTION,USER_ID,TRANS_DATE,TRANS_TIME)
	VALUES('$dlr','$sales_no','$action','$inisial','$tanggal','$jam')";
	mysqli_query($conn, $tsql);}
	
	//================================================================
	//                         LOG HISTORY SALES 2					//
	//================================================================	
	Function GetLogSales2($dlr,$inisial,$sales_no,$remark,$action)
	{date_default_timezone_set("Asia/Jakarta");
	$tanggal=date('m/d/Y');
	$jam=date("H:i:s");
	include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";	
	$tsql = "INSERT INTO Z_LOG_PROCESS(DEALER_CODE,SALES_NO,ACTION,REMARK,USER_ID,TRANS_DATE,TRANS_TIME)
	VALUES('$dlr','$sales_no','$action','$remark','$inisial','$tanggal','$jam')";
	mysqli_query($conn, $tsql);}
	
	//================================================================
	//                            Terbilang						    //
	//================================================================		
	Function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;}
 
	Function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		$hasil="$hasil rupiah.";
		return $hasil;}

	//================================================================
	//                            GET DEALER					    //
	//================================================================			
	Function getds1($dlr,$kode,$dlr_code) {	
		if($dlr_code==""):
			$dlr_code="$dlr";
			if($kode=="HO" or $kode=="SU") {$dlr_code="All Dealer";}
		endif;			
		return $dlr_code;}		

	Function getds2($kode) {	
		$ds="disabled";
		if($kode=="HO" or $kode=="SU" or $kode=="GM") {$ds="";}		
		return $ds;}		

			
	//================================================================
	//                            SUKSES 						    //
	//================================================================			
	Function getsukses() {	
	?>			
		<style>
			body{background: #ecf0f1;}
			.product{position: relative;}
			.success {
				position: fixed;
				z-index: 1000;	
				left: 520px;
				top: 300px;					
				width: 230px; 
				border: 2px solid;
				margin: 15px 0px;
				padding:5px 10px 5px 55px;
				font: bold 16px Comic Sans MS;
				border-radius:5px;
				color: #c0392b;
				background:#55efc4;}	
			DIVISI{
				position: fixed;
				z-index: 1000;		
				color: red;				
				left:765px;
				top:393px;}					
		</style>	
		<script src="Support/Jquery/jquery.js"></script>		
		<div id="bg"></div>
		<div id="modal-kotak" style="background:#81ecec;">
			<?php echo "<div class='success'><h1>Successful...</h1></div>";  ?>
			<div id="bawah" style="background: #b2bec3">
				<DIVISI><button id="tombol-tutup"><b>Close</b></button></DIVISI>	 
			</div>
		</div>			
		<script type="text/javascript">
			$(document).ready(function(){			
				$('#modal-kotak , #bg').fadeIn("slow");				
				$('#tombol-tutup').click(function(){
					$('#modal-kotak , #bg').fadeOut("slow");
				});
			});
		</script>	
		
	<?php
	return $pesan;}
	
	//================================================================
	//                            SUKSES 2						    //
	//================================================================	
	Function getsukses2() {	
	?>	
		<style>
			body{background: #ecf0f1;}
			.product{position: relative;}				
			DIVISI{
				position: fixed;
				z-index: 1000;		
				color: red;				
				left:570px;
				top:230px;}		
		</style>
		<script src="Support/Jquery/jquery.js"></script>
		<DIVISI>
			<div id="bg"></div>
			<div id="modal-kotak" style="background:#81ecec;">
				<div id="atas">
					<br>
					<h1>&nbsp &nbsp &nbsp &nbsp &nbsp Successful... &nbsp &nbsp &nbsp &nbsp &nbsp </h1>
					<p>
				</div>
				<div id="bawah" style="background: #b2bec3">
					<button id="tombol-tutup">&nbsp &nbsp CLOSE &nbsp &nbsp</button>
				</div>
			</div>	
		</DIVISI>	 
		<script type="text/javascript">
			$(document).ready(function(){			
				$('#modal-kotak , #bg').fadeIn("slow");				
				$('#tombol-tutup').click(function(){
					$('#modal-kotak , #bg').fadeOut("slow");
				});
			});
		</script>	
	<?php	
	return $pesan;}

	//================================================================
	//                            SUKSES 3						    //
	//================================================================		
	Function getsukses3($pesan) {	
	?>	
		<style>
			body{background: #ecf0f1;}
			.product{position: relative;}				
			DIVISI{
				position: fixed;
				z-index: 1000;	
				Color:blue;				
				left:500px;
				top:250px;}
			MSG{
				position: absolute;
				font-size:18px;
				font-color:blue;
				left: 40px;
				top: 75px;}		
			MSG2{
				position: absolute;
				font-size:16px;
				font-color:blue;
				top: 156px;
				left: 0px;}					
			C1{Color:#d63031;}
		</style>
		<script src="Support/Jquery/jquery.js"></script>
		<DIVISI>
			<div id="bg"></div>
			<div id="modal-kotak" style="background: #55efc4">
				<div id="atas" style="background: #b2bec3">
					&nbsp
				</div>			
				<div id="atas">
					<h2>&nbsp &nbsp &nbsp <?php echo"<C1>Successful...</C1>"?> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </h2>
					<MSG><?php echo"$pesan"?> &nbsp &nbsp &nbsp</MSG>
					<br><br><br><br>
				</div>				
				<div id="atas" style="background: #b2bec3">
					&nbsp
				</div>									
				<div id="bawah" style="background: #b2bec3">
					<MSG2><button style="height:19px;" id="tombol-tutup"><font color="blue">&nbsp &nbsp &nbsp Close &nbsp &nbsp &nbsp </button></MSG2>
				</div>
			</div>	
		</DIVISI>
		<script type="text/javascript">
			$(document).ready(function(){			
				$('#modal-kotak , #bg').fadeIn("slow");				
				$('#tombol-tutup').click(function(){
					$('#modal-kotak , #bg').fadeOut("slow");
				});
			});
		</script>	
	<?php	
	return $pesan;}	
	
	//================================================================
	//                           GET FAILED						    //
	//================================================================		
	Function getfail($pesan) {	
	?>	
		<style>
			body{background: #ecf0f1;}
			.product{position: relative;}				
			DIVISI{
				position: fixed;
				z-index: 1000;	
				Color:blue;				
				left:500px;
				top:250px;}
			MSG{
				position: absolute;
				font-size:18px;
				font-color:blue;
				left: 30px;
				top: 75px;}		
			MSG2{
				position: absolute;
				font-size:16px;
				font-color:blue;
				top: 148px;
				left: 0px;}	
			C1{Color:#d63031;}
		</style>
		<script src="Support/Jquery/jquery.js"></script>
		<?php
		//$pesan=str_replace(".",".<br>",$pesan);
		?>
		<DIVISI>
			<div id="bg"></div>
			<div id="modal-kotak" style="background: #55efc4">
				<div id="atas" style="background: #b2bec3">
					&nbsp
				</div>			
				<div id="atas">
					<h3>&nbsp &nbsp &nbsp <?php echo"<C1>Process Failed...!</C1>"?> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </h3>
					<MSG><?php echo"$pesan"?> &nbsp &nbsp &nbsp</MSG>
					<br><br><br><br>
				</div>		
				<div id="atas" style="background: #b2bec3">
					&nbsp
				</div>					
				<div id="bawah" style="background: #b2bec3">
					<MSG2><button style="height:19px;" id="tombol-tutup"><font color="blue">&nbsp &nbsp &nbsp Close &nbsp &nbsp &nbsp </button></MSG2>
				</div>
			</div>	
		</DIVISI>
		<script type="text/javascript">
			$(document).ready(function(){			
				$('#modal-kotak , #bg').fadeIn("slow");				
				$('#tombol-tutup').click(function(){
					$('#modal-kotak , #bg').fadeOut("slow");
				});
			});
		</script>	
	<?php	
	return $pesan;}
	
	//================================================================
	//                            GET INFO						    //
	//================================================================		
	Function getinfo($pesan) {	
	?>	
		<style>
			body{background: #ecf0f1;}
			.product{position: relative;}				
			DIVISI{
				position: fixed;
				z-index: 1000;	
				Color:blue;				
				left:500px;
				top:250px;}
			MSG{
				position: absolute;
				font-size:18px;
				font-color:blue;
				left: 30px;
				top: 75px;}		
			MSG2{
				position: absolute;
				font-size:16px;
				font-color:blue;
				top: 148px;
				left: 0px;}					
			C1{Color:#d63031;}
		</style>
		<script src="Support/Jquery/jquery.js"></script>
		<DIVISI>
			<div id="bg"></div>
			<div id="modal-kotak" style="background: #55efc4">
				<div id="atas" style="background: #b2bec3">
					&nbsp
				</div>			
				<div id="atas">
					<h3>&nbsp &nbsp &nbsp <?php echo"<C1>Information...!</C1>"?> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </h3>
					<MSG><?php echo"$pesan"?> &nbsp &nbsp &nbsp</MSG>
					<br><br><br><br>
				</div>				
				<div id="atas" style="background: #b2bec3">
					&nbsp
				</div>									
				<div id="bawah" style="background: #b2bec3">
					<MSG2><button style="height:19px;" id="tombol-tutup"><font color="blue">&nbsp &nbsp &nbsp Close &nbsp &nbsp &nbsp </button></MSG2>
				</div>
			</div>	
		</DIVISI>
		<script type="text/javascript">
			$(document).ready(function(){			
				$('#modal-kotak , #bg').fadeIn("slow");				
				$('#tombol-tutup').click(function(){
					$('#modal-kotak , #bg').fadeOut("slow");
				});
			});
		</script>	
	<?php	
	return $pesan;}
	
	//================================================================
	//                            GET PESAN						    //
	//================================================================		
	Function getpesan($pesan,$kode) {	
	?>	
		<style>
			body{background: #ecf0f1;}
			.product{position: relative;}				
			DIVISI{
				position: fixed;
				z-index: 1000;		
				color: black;				
				left:500px;
				top:200px;}		
		</style>
		<script src="Support/Jquery/jquery.js"></script>
		<DIVISI>
			<div id="bg"></div>
			<div id="modal-kotak" style="background: #55efc4">
				<div id="atas">
					&nbsp
					<h3>&nbsp &nbsp <?php echo"$kode"?> : &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</h3>
					<h4>&nbsp &nbsp &nbsp<?php echo"$pesan"?> </h4>
					&nbsp
				</div>
				<div id="bawah" style="background: #b2bec3">
					<button id="tombol-tutup"><font color="blue">&nbsp &nbsp CLOSE &nbsp &nbsp</button>
				</div>
			</div>	
		</DIVISI>
		<script type="text/javascript">
			$(document).ready(function(){			
				$('#modal-kotak , #bg').fadeIn("slow");				
				$('#tombol-tutup').click(function(){
					$('#modal-kotak , #bg').fadeOut("slow");
				});
			});
		</script>	
	<?php	
	return $pesan;}	


	//================================================================
	//                         SUKSES ANDROID						//
	//================================================================			
	Function getsukses_android() {	
	?>			
		<style>
			body{background: #ecf0f1;}
			.product{position: relative;}
			.success {
				position: fixed;
				z-index: 1000;	
				left: 40px;
				top: 280px;					
				width: 230px; 
				border: 2px solid;
				margin: 15px 0px;
				padding:5px 10px 5px 55px;
				font: bold 16px Comic Sans MS;
				border-radius:5px;
				color: #c0392b;
				background:#55efc4;}	
			DIVISI{
				position: fixed;
				z-index: 1000;		
				color: red;				
				left:285px;
				top:363px;}					
		</style>	
		<script src="Support/Jquery/jquery.js"></script>		
		<div id="bg"></div>
		<div id="modal-kotak" style="background:#81ecec;">
			<?php echo "<div class='success'><h1>Successful...</h1></div>";  ?>
			<div id="bawah" style="background: #b2bec3">
				<DIVISI><button id="tombol-tutup"><b>Close</b></button></DIVISI>	 
			</div>
		</div>			
		<script type="text/javascript">
			$(document).ready(function(){			
				$('#modal-kotak , #bg').fadeIn("slow");				
				$('#tombol-tutup').click(function(){
					$('#modal-kotak , #bg').fadeOut("slow");
				});
			});
		</script>	
		
	<?php
	return $pesan;}
	
	//================================================================
	//                         GET FAILED ANDROID					//
	//================================================================		
	Function getfail_android($pesan) {	
	?>	
		<style>
			body{background: #ecf0f1;}
			.product{position: relative;}				
			DIVISI{
				position: fixed;
				z-index: 1000;	
				Color:blue;				
				left:5px;
				top:240px;}
			MSG{
				position: absolute;
				font-size:16px;
				font-color:blue;
				left: 20px;
				top: 75px;}		
			MSG2{
				position: absolute;
				font-size:16px;
				font-color:blue;
				top: 135px;
				left: 0px;}	
			C1{Color:#d63031;}
		</style>
		<script src="Support/Jquery/jquery.js"></script>
		<?php
		//$pesan=str_replace(".",".<br>",$pesan);
		?>
		<DIVISI>
			<div id="bg"></div>
			<div id="modal-kotak" style="background: #55efc4">
				<div id="atas" style="background: #b2bec3">
					&nbsp
				</div>			
				<div id="atas">
					<h3>&nbsp <?php echo"<C1>Process Failed...!</C1>"?> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </h3>
					<MSG><?php echo"$pesan"?> &nbsp &nbsp &nbsp</MSG>
					<br><br><br>
				</div>		
				<div id="atas" style="background: #b2bec3">
					&nbsp
				</div>					
				<div id="bawah" style="background: #b2bec3">
					<MSG2><button style="height:19px;" id="tombol-tutup"><font color="blue">&nbsp &nbsp &nbsp Close &nbsp &nbsp &nbsp </button></MSG2>
				</div>
			</div>	
		</DIVISI>
		<script type="text/javascript">
			$(document).ready(function(){			
				$('#modal-kotak , #bg').fadeIn("slow");				
				$('#tombol-tutup').click(function(){
					$('#modal-kotak , #bg').fadeOut("slow");
				});
			});
		</script>	
	<?php	
	return $pesan;}	
	
	//================================================================
	//                            GET INFO						    //
	//================================================================		
	Function getinfo_android($pesan) {	
	?>	
		<style>
			body{background: #ecf0f1;}
			.product{position: relative;}				
			DIVISI{
				position: fixed;
				z-index: 1000;	
				Color:blue;				
				left:5px;
				top:240px;}
			MSG{
				position: absolute;
				font-size:16px;
				font-color:blue;
				left: 20px;
				top: 75px;}		
			MSG2{
				position: absolute;
				font-size:16px;
				font-color:blue;
				top: 135px;
				left: 0px;}	
			C1{Color:#d63031;}
		</style>
		<script src="Support/Jquery/jquery.js"></script>
		<DIVISI>
			<div id="bg"></div>
			<div id="modal-kotak" style="background: #55efc4">
				<div id="atas" style="background: #b2bec3">
					&nbsp
				</div>			
				<div id="atas">
					<h3>&nbsp <?php echo"<C1>Information...!</C1>"?> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </h3>
					<MSG><?php echo"$pesan"?> &nbsp &nbsp &nbsp</MSG>
					<br><br><br>
				</div>				
				<div id="atas" style="background: #b2bec3">
					&nbsp
				</div>									
				<div id="bawah" style="background: #b2bec3">
					<MSG2><button style="height:19px;" id="tombol-tutup"><font color="blue">&nbsp &nbsp &nbsp Close &nbsp &nbsp &nbsp </button></MSG2>
				</div>
			</div>	
		</DIVISI>
		<script type="text/javascript">
			$(document).ready(function(){			
				$('#modal-kotak , #bg').fadeIn("slow");				
				$('#tombol-tutup').click(function(){
					$('#modal-kotak , #bg').fadeOut("slow");
				});
			});
		</script>	
	<?php	
	return $pesan;}	
	
	
	//================================================================
	//                        SEND WHATSAPP							//
	//================================================================
	Function SendWA($hp,$pesan)
	{include "C:/XAMPP/htdocs/GUNDAR/WHATSAPP/WhatsappAPI.php";	
	if (substr($hp,0,1)=="0"):
		$hp=substr($hp,1,20);
	endif;	
	$wp = new WhatsappAPI("2797", "dae72f5fc595db0045c37e9ce06214a58e97d7c6"); 
	$number = "$hp";	 
	$message = $pesan; 
	$status = $wp->sendText($number, $message);	
	$status=trim($status);
	return $status;}		
			
	//================================================================
	//                         WHATSAPP REPORT 1				    //
	//================================================================
	Function ReportWA($dlr,$modul,$fungsi,$trans_no,$hp,$status)
	{include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	date_default_timezone_set("Asia/Jakarta");
	$tanggal=date('m-d-Y');
	$jam=date("H:i:s");		
	if ($status=='' or $status=='{"status":"error","response":"Number is not registered with WhatsApp"}'):
		$sts="Not Success";
	endif;
	if ($status=='{"status":"success","response":"Message sent successfully"}'):
		$sts="Success";
	endif;		
    $tsql = "INSERT INTO WA_HISTORY(DEALER_CODE,MODUL,FUNGSI,TRANS_NO,HP_NO,STATUS,TRANS_DATE,TRANS_TIME,PENGIRIM)
	VALUES('$dlr','$modul','$fungsi','$trans_no','$hp','$sts','$tanggal','$jam','GUNDAR')";	
	mysqli_query($conn, $tsql);	}		
				
	//================================================================
	//                         WHATSAPP REPORT 2				    //
	//================================================================
	Function ReportWA2($dlr,$pengirim,$trans_no,$pesan,$hp,$status)
	{include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";
	date_default_timezone_set("Asia/Jakarta");
	$tanggal=date('m-d-Y');
	$jam=date("H:i:s");		
	if ($status=='' or $status=='{"status":"error","response":"Number is not registered with WhatsApp"}'):
		$sts="Not Success";
	endif;
	if ($status=='{"status":"success","response":"Message sent successfully"}'):
		$sts="Success";
	endif;		
    $tsql = "INSERT INTO WA_HISTORY(DEALER_CODE,PENGIRIM,TRANS_NO,PESAN,HP_NO,STATUS,TRANS_DATE,TRANS_TIME)
	VALUES('$dlr','$pengirim','$trans_no','$pesan','$hp','$sts','$tanggal','$jam')";		
	mysqli_query($conn, $tsql);	}
				
	//================================================================
	//                          SEND EMAIL    					    //
	//================================================================	
	Function GetEmail_Approval($dlr,$mgr,$sales_no,$msg)
	{error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
	include "C:/XAMPP/htdocs/GUNDAR/koneksi.php";	
	$tsql = "SELECT EMAIL FROM Z_SALES_USER WHERE DEALER_CODE='$dlr' AND INITIAL='$mgr'";	
	$result = mysqli_query($conn, $tsql);
	$row = mysqli_fetch_array($result);
	$email=$row['EMAIL']; 
	require 'C:/XAMPP/htdocs/GUNDAR/EMAIL/phpmailer/PHPMailerAutoload.php';
	//$message = file_get_contents("C:/XAMPP/htdocs/GUNDAR/EMAIL/SO_Approval.php");
	$message="SALES ORDER APPROVAL <br><br>
			  Sales No.	: $sales_no <br>
			  Salesman  : $mgr <br>
			  Action 	: Need to be approved <br><br>	
			  link  	: $msg <br>	
	";			
	$mail = new PHPMailer(true);
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->Username = 'gasys2112@gmail.com';
	$mail->Password = 'ffhklykoniowbaeh';  //Password dapat dari setting chrome
	$mail->Subject = 'GASYS : SO Approval';
	$mail->SetFrom('gasys2112@gmail.com', 'Gasys Admin');
	$mail->AddAddress($email);
	//$mail->AddAddress($email);
	//$mail->AddCC('');
	//$mail->AddBCC('');
	$mail->MsgHTML($message);
	try {$mail->Send();} 
	catch (phpmailerException $e) {} 	
	}			
			
?>
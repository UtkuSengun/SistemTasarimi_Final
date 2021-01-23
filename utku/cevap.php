<?php
	$isim=$_POST["isim_"];
	$tc=$_POST["tc_"];
	$telefon=$_POST["telefon_"];
	$mail=$_POST["mail_"];
	$tutar=$_POST["tutar_"];

	$db=new mysqli("localhost","root","","sistem");
	$db->set_charset("utf8");

	//echo $isim."-".$tc."-".$telefon."-".$mail."-".$tutar;
	$sorgu="insert into ogrenci(ad_Soyad,tc_No,tel_No,e_Mail,tutar)values('$isim','$tc','$telefon','$mail','$tutar')";
	
	$sonuc=$db->query($sorgu);
	//insert sorgusu dönen değer true ya da false döner. 
	//1 değeri dönerse kayıt başarılı, 0 dönerse başarısız.
	if($sonuc==true){
		echo"<div class='col-3'>";
							echo"<div class='row p-2'>";
								echo"<div class='col-12 border border-secondary rounded'>";
									echo"<div class='row text-center p-2'>";
										echo"<div class='col-12 p-2 bg-dark text-light font-weight-bold'>$isim</div>";
										echo"<div class='col-12 p-2'> <span class='font-weight-bold'>Tel:</span> $telefon</div>";
										echo"<div class='col-12 p-2'><span class='font-weight-bold'>Tc:</span> $tc</div>";
										echo"<div class='col-12 p-2'>$mail</div>";
										echo"<div class='col-12 p-2 bg-warning font-weight-bold' style='font-size:18px'>Tutar: $tutar</div>";
									echo"</div>";
								echo"</div>";
							echo"</div>";
		echo"</div>";
	}
	else{
		echo "kayıt eklenemedi !";
	}

?>
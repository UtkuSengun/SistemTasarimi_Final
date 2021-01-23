<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Kayıt işlemi</title>
	<link rel='stylesheet' type='text/css' href='main.css'>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
	<script src='js/jquery-3.3.1.min.js'></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#kaydet").click(function(){
				isim=$("#isimtxt").val();
				telefon=$("#teltxt").val();
				tc=$("#tctxt").val();
				mail=$("#mailtxt").val();
				tutar=$("#tutartxt").val();

				$.ajax({
					url:'cevap.php',
					type:'post',
					data:{isim_:isim,telefon_:telefon,tc_:tc,mail_:mail,tutar_:tutar},
					success:function(gelenCevap){
						$("#sistem").append(gelenCevap);
					}
				});
			});
		});
	</script>

</head>
<body>
		<div class='container-fluid'>
	<div class='row h-50'>
		<div class='col-12  text-center '>
			<div class='row h-25'>
				<div class='col-6 text-danger font-weight-bold'>+90 (531) 335 5528 | utkusengunn@gmail.com </div>
					<div class='col-6'>
						<a href='https://www.instagram.com/utkusengunn/?hl=tr'target='_blank' class='col-auto'><img src='img/instagram1.png' class='img-fluid social'></a>
						<a href='https://twitter.com/Utkusengunn'target='_blank' class='col-auto '><img src='img/twitter1.png' class='img-fluid social'></a>
                		<a href='https://www.facebook.com/utku.sengun.14/'target='_blank' class='col-auto'><img src='img/facebook1.png' class='img-fluid social'></a>
				</div>
			</div>
		</div>
	</div>
</div>
		<div class='container'>
		<div class='row'>
			<div class='col-12 text-center mt-3'>
				<img src='img/logo.png' class='img-fluid logo rounded'> <br>
				<span class='text-danger opacity'>Winner LIFE Dil Kursu</span>
			</div>
		</div>
	</div>

		<div class='container italic text1 text2'>
			<div class='col-12 my-4'>
				<div class='row  rounded justify-content-center'>
					<div class='col-auto my-3'>
						<a href='index.html'><img src='img/home.png' class='img-fluid social'></a>
					</div>
					<div class='col-auto my-3'>
						<a href='hakkimizda.html' class='text-danger italic font-weight-bold'>Hakkımızda</a>
					</div>
					<div class='col-auto my-3'>
						<a href='ingilizce.html'  class='text-danger italic font-weight-bold'>İngilizce Kursu</a>
					</div>
					<div class='col-auto my-3'>
						<a href='cocuk.html' class='text-danger italic font-weight-bold'>Çocuk İngilizcesi</a>
					</div>
					<div class='col-auto my-3'>
						<a href='almanca.html'  class='text-danger italic font-weight-bold'>Almanca Kursu</a>
					</div>
					<div class='col-auto my-3'>
						<a href='sinavKursu.html'  class='text-danger italic font-weight-bold'>YDS/YKS Kursu</a>
					</div>
					<div class='col-auto my-3'>
						<a href='Kampanyalar.html'  class='text-danger italic font-weight-bold'>Kampanyalar</a>
					</div>
					<div class="col-auto my-3">
						<a href="kayit.php"  class="text-danger italic font-weight-bold">Kayıt İşlemi</a>
					</div>
					<div class="col-auto my-3">
						<a href="odeme.php"  class="text-danger italic font-weight-bold">Ödeme İşlemi</a>
					</div>
					
				</div>
			</div>
		</div>

			<div class='container'>

				<div class="row my-3">
					<div class="col-12 bg-light rounded">
						<div class="row p-2">
							<div class="col-3 text-right align-self-center">
								<label class="font-weight-bold">Ad Soyad:</label>
							</div>
							<div class="col-5">
								<input type="text" id="isimtxt" class="form-control">
							</div>

							<div class="w-100 my-1"></div>

							<div class="col-3 text-right align-self-center">
								<label class="font-weight-bold">Telefon Numarası:</label>
							</div>
							<div class="col-5">
								<input type="text" id="teltxt" class="form-control">
							</div>

							<div class="w-100 my-1"></div>

							<div class="col-3 text-right align-self-center">
								<label class="font-weight-bold">TC Numarası:</label>
							</div>
							<div class="col-5">
								<input type="text" id="tctxt" class="form-control">
							</div>

							<div class="w-100 my-1"></div>

							<div class="col-3 text-right align-self-center">
								<label class="font-weight-bold">E-mail:</label>
							</div>
							<div class="col-5">
								<input type="text" id="mailtxt" class="form-control">
							</div>

							<div class="w-100 my-1"></div>

							<div class="col-3 text-right align-self-center">
								<label class="font-weight-bold">Ödenecek Tutar:</label>
							</div>
							<div class="col-5">
								<input type="text" id="tutartxt" class="form-control">
							</div>

							<div class="w-100 my-1"></div>

							<div class="col-3 text-right">
								<button class="btn btn-danger" id="kaydet">Kaydet</button>
							</div>

							
							
						</div>
					</div>
				</div>

				<h5 class="font-weight-bold text-center text-danger bg-light">Kayıtlı Öğrencilerimiz</h5>

				<div class='row'id="sistem">
					<?php

					$db=new mysqli("localhost","root","","sistem");
					$db->set_charset("utf8");
					$sorgu="select * from ogrenci";
					$sonuc=$db->query($sorgu);
					$ks=$sonuc->num_rows;

					for($i=0;$i<$ks;$i++){
						$kayit=$sonuc->fetch_assoc();
						$isim=$kayit["ad_Soyad"];
						$tc=$kayit["tc_No"];
						$telefon=$kayit["tel_No"];
						$mail=$kayit["e_Mail"];
						$tutar=$kayit["tutar"];

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
					?>
				</div>
			</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Ödeme işlemi</title>
	<link rel='stylesheet' type='text/css' href='main.css'>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
	<script src='js/jquery-3.3.1.min.js'></script>
</head>
<body>

  <div class="container-fluid">
      <div class="row h-50">
        <div class="col-12  text-center ">
          <div class="row h-25">
            <div class="col-6 text-danger font-weight-bold">+90 (531) 335 5528 | utkusengunn@gmail.com </div>
              <div class="col-6">
                <a href="https://www.instagram.com/utkusengunn/?hl=tr"target="_blank" class="col-auto"><img src="img/instagram1.png" class="img-fluid social"></a>
                <a href="https://twitter.com/Utkusengunn"target="_blank" class="col-auto "><img src="img/twitter1.png" class="img-fluid social"></a>
                        <a href="https://www.facebook.com/utku.sengun.14/"target="_blank" class="col-auto"><img src="img/facebook1.png" class="img-fluid social"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
      <div class="row">
        <div class="col-12 text-center mt-3">
          <a href="index.html"><img src="img/logo.png" class="img-fluid logo"></a>
          <span class="text-danger opacity ml-2">Winner LIFE Dil Kursu</span>
        </div>
      </div>
      </div>
  <hr>

      <div class="container italic text1 text2">
      <div class="col-12 my-4">
        <div class="row  rounded justify-content-center">
          <div class="col-auto my-3">
            <a href="index.html"><img src="img/home.png" class="img-fluid social"></a>
          </div>
          <div class="col-auto my-3">
            <a href="hakkimizda.html" class="text-danger italic font-weight-bold">Hakkımızda</a>
          </div>
          <div class="col-auto my-3">
            <a href="ingilizce.html"  class="text-danger italic font-weight-bold">İngilizce Kursu</a>
          </div>
          <div class="col-auto my-3">
            <a href="cocuk.html" class="text-danger italic font-weight-bold">Çocuk İngilizcesi</a>
          </div>
          <div class="col-auto my-3">
            <a href="almanca.html"  class="text-danger italic font-weight-bold">Almanca Kursu</a>
          </div>
          <div class="col-auto my-3">
            <a href="sinavKursu.html"  class="text-danger italic font-weight-bold">YDS/YKS Kursu</a>
          </div>
          <div class="col-auto my-3">
            <a href="Kampanyalar.html"  class="text-danger italic font-weight-bold">Kampanyalar</a>
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
  <hr>

	<div class="container">
   <form method="POST" class="jumbotron">
   	<div class="form-group">
   		<label for="exampleFormControlInput1" class="font-weight-bold"> Öğrenci No:</label>
   		<input type="number" class="form-control" name="no" placeholder="İd giriniz...">
   	</div>
   	<div class="form-group">
   		<label for="exampleFormControlInput1" class="font-weight-bold">Ödenecek Tutar:</label>
   		<input type="number" min="0" class="form-control" name="tutar" placeholder="Ödeyeceğiniz tutarı giriniz...">
   	</div>

   	<button type="submit" class="btn btn-danger">Ödeme Yap</button>
   	
   </form>

   <?php
   $servername="localhost";
   $database ="sistem";
   $username ="root";
   $password ="";
   $conn=mysqli_connect($servername,$username,$password,$database);
   if(!$conn){
   	die("veritabanı hatası:".mysql_connect_error());
   }
   if($_POST){
   	$tc=$_POST["no"];
   	$tutar=$_POST["tutar"];
   	$ogrGetir=$conn->query("select id,tutar from ogrenci where id ='$tc' ");
   	$sonuc = $ogrGetir->fetch_array();
   	$toplam=$sonuc["tutar"];
   	$yeniTutar = $toplam-$tutar;

  echo"<div class ='container text-center font-weight-bold yaziBoyut'>";
  echo"<div class ='row'>";
  echo"<div class ='col-6 bg-warning'>";
echo"Ödediğiniz Taksit: $tutar";
   echo"</div>";
   echo"<div class ='col-6 bg-warning'>";
  echo"Kalan Tutar:  $yeniTutar";
   echo"</div>";

  echo"</div>";
   echo"</div>";

   
   	$ogrOde = "uptade ogrenci set tutar = '$yeniTutar' where id ='$tc'";
   	if(mysqli_query($conn,$ogrOde))
                                {    
                                      $sql = "INSERT INTO rapor (id, tutar) VALUES ('$tc', '$tutar')";
                                        if (mysqli_query($conn, $sql))
                                        {
                                            echo "<div class='alert alert-success' role='alert'>Kayıt Yapıldı.</div>";
                                        } else 
                                        {
                                            echo "<div class='alert alert-danger' role='alert'>Kayıt Yapılamadı.</div>";
                                        }
                                }
   	
   }

   ?>

   </div>
</body>
</html>
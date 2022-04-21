<?php 
require 'functions.php';
session_start();

//algoritma untuk pagination
$jumlahDataPerhalaman = 4;
$jumlahData = count(query("SELECT * FROM mahasiswa"));//jumlah datanya
$jumlahHalaman = round($jumlahData / $jumlahDataPerhalaman);

//cek jika ada input laman di url
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
//batas
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;




$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData ,$jumlahDataPerhalaman");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
   
</head>
<body>


<nav>
	<div class="wrapper">
		<div class="logo"><a href="">Data Mahasiswa</a></div>
		<div class="menu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#Contact">Contact</a></li> 
				<li><a href="#About">About</a></li>
				<li><a href="#Sosial">Help</a></li>
				<li><a href="./login.php" class="tbl-hijau">Login</a></li>
			</ul>
		</div>
	</div>
</nav>

<h1>Daftar Mahasiswa</h1>
<br>

<div class="container">
	<form action="" method="post" class="nosubmit position-relative">

		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off" class="form-control  " style="width:30%; float:left">
		
		<button type="submit" name="cari" class="btn btn-teal me-2 me-auto mb-2 " style="background:green;color:white ">Cari!</button>
		
		<br><br>
		<a>Login terlebih dahulu untuk menambahkan data!</a>
		<br>

	</form>
	<br>

	<table class="table1" border="1" cellspacing="10" cellpadding="20" style = "margin-top:20px;position:center;">

		<tr>
			<th>No.</th>
			<th>Gambar</th>
			<th>NRP</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>

		<?php $i = 1; ?>
		
		<?php foreach( $mahasiswa as $row ) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td><img src="img/<?= $row["gambar"]; ?>" width="100px" height="120px"></td>
			<td><?= $row["nrp"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["email"]; ?></td>
			<td><?= $row["jurusan"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
		
	</table>
	<br>

	<?php if($halamanAktif > 1): ?>
		<a href= "?halaman= <?=$halamanAktif -1;?>"> &lt; </a>
	<?php endif; ?>

	
	<!-- navigasi -->
	<?php for ($i = 1 ; $i <= $jumlahHalaman; $i++) : ?>
			<?php if($i == $halamanAktif): ?>
				<a href="?halaman= <?= $i ?>" class="ubah" style="font-weight:bold; color-font:black margin-right:80px; font-size:20px;"> <?= $i ?> </a>
			<?php else: ?>
				<a style="font-size:20px;" href="?halaman= <?= $i ?>"> <?= $i ?> </a>
			<?php endif; ?>
	<?php endfor;?>
</div>

    <div id="contact" style="margin-top: 50px;">
        <div class="wrapper">
            <div class="footer">
                <div class="footer-section" id="CoUrgent">
                    <h3 style="text-align:center;">CoUrgent</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem, officia?</p>
                </div>
                <div class="footer-section" id="About">
                    <h3 style="text-align:center;">About</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem, officia?</p>
                </div>
                <div class="footer-section" id="Contact">
                    <h3 style="text-align:center;">Contact</h3>
                    <p>Jl. Sultan iskandar muda, Aceh besar,</p>
                    <p>Kode Pos: 1234</p>
                </div>
                <div class="footer-section" id="Sosial">
                    <h3 style="text-align:center;">Sosial</h3>
                    <p><b>YouTube: </b> Kelompok-2</p>
                </div>
            </div>
			<div id="copyright">
				<div class="wrapper">
					&copy; 2022. <b>Kelompok-2</b> All Right reserved
				</div>
			</div>
        </div>
    </div>

    

</body>
</html>
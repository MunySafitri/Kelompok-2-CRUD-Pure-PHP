<?php 
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

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
    <title>Munyet</title>
    <link rel="stylesheet" href="style.css">
  
   
</head>
<body>


<nav>
	<div class="wrapper">
		<div class="logo"><a href="">Munyet</a></div>
		<div class="menu">
			<ul>
				<li><a href="/Home">Home</a></li>
				<li><a href="/Contact">Contact</a></li> 
				<li><a href="/About">About</a></li>
				<li><a href="/Help">Help</a></li>
				<li><a href="" class="tbl-hijau">Log out</a></li>
			</ul>
		</div>
	</div>
</nav>

<h1>Daftar Mahasiswa</h1>
<br><br>

<form action="" method="post">
	<a class="tbh" href="tambah.php">Tambah</a>
	<br><br>
</form>
<br>
<table class="table1" border="1" cellpadding="10" cellspacing="0">

	<tr>
		<th>No.</th>
		<th>Aksi</th>
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
		<td>
			<a href="ubah.php?id=<?= $row["id"]; ?>" class="ubah">ubah</a> |
			<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');" class="hapus">hapus</a>
		</td>
		<td><img src="img/<?= $row["gambar"]; ?>" width="100px" height="90px"></td>
		<td><?= $row["nrp"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
	
</table>
    <div id="contact">
        <div class="wrapper">
            <div class="footer">
                <div class="footer-section">
                    <h3>CoUrgent</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem, officia?</p>
                </div>
                <div class="footer-section">
                    <h3>About</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem, officia?</p>
                </div>
                <div class="footer-section">
                    <h3>Contact</h3>
                    <p>Jl. Sultan iskandar muda, Aceh besar,</p>
                    <p>Kode Pos: 1234</p>
                </div>
                <div class="footer-section">
                    <h3>Sosial</h3>
                    <p><b>YouTube: </b> Munyet</p>
                </div>
            </div>
        </div>
    </div>

    <div id="copyright">
        <div class="wrapper">
            &copy; 2022. <b>Munyet</b> All Right Reserve
        </div>
    </div>

</body>
</html>
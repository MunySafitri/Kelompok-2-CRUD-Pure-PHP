<?php
require 'functions.php';
session_start();

if(isset($_SESSION['loggedIn']) != true){ 
    header("Location: index.php");
}

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'home.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'home.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah data mahasiswa</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
</head>
<body>
	<nav>
		<div class="wrapper">
			<div class="logo"><a href="">Ubah Data Mahasiswa</a></div>
			<div class="menu">
			<ul>
					<li><a href="home.php">Home</a></li>
					<li><a href="home.php/#Contact">Contact</a></li> 
					<li><a href="home.php/#About">About</a></li>
					<li><a href="home.php/#Sosial">Help</a></li>
					<li><a href="logout.php" class="tbl-hijau">Logout</a></li>
			</ul>
			</div>
		</div>
	</nav>
	<h1>Ubah data mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
		<ul>
			<li>
				<label for="nrp">NRP : </label>
				<input size="40" autofocus placeholder="Masukkan Email.." autocomplete="off" class="form-control  " style="width:30%; "  type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]; ?>">
			</li>
			<li>
				<label for="nama">Nama : </label>
				<input size="40" autofocus placeholder="Masukkan Email.." autocomplete="off" class="form-control  " style="width:30%; "  type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="email">Email :</label>
				<input size="40" autofocus placeholder="Masukkan Email.." autocomplete="off" class="form-control  " style="width:30%; "  type="text" name="email" id="email" value="<?= $mhs["email"]; ?>">
			</li>
			<li>
				<label for="jurusan">Jurusan :</label>
				<input size="40" autofocus placeholder="Masukkan Email.." autocomplete="off" class="form-control  " style="width:30%; "  type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar :</label> <br>
				<img src="img/<?= $mhs['gambar']; ?>" width="40"> <br>
				<input size="40" autofocus placeholder="Masukkan Email.." autocomplete="off" class="form-control  " style="width:30%; "  type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit" class="btn btn-primary me-2 me-auto mt-4">Ubah Data!</button>
			</li>
		</ul>

	</form>

	<div id="copyright" class="footer" style="background-color:rgb(104, 131, 140);">
        <div class="wrapper">
            &copy; 2022. <b>Kelompok-2</b> All Right reservedd
        </div>
    </div>




</body>
</html>
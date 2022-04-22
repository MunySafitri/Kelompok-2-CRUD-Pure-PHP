<?php 
 
$conn = mysqli_connect("localhost", "root", "", "CRUD");
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: home.php");
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['loggedIn'] = true;
        header("Location: home.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Login</title>
</head>
<body>
<body>
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error']?>
    </div>
 
    <div class="container">
        <form action="" method="POST" class="login-email nosubmit position-relative">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group mb-3">
                <input class="form-control  " style="width:30%; float:left; " type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group mb-3">
                <input class="form-control  " style="width:30%; float:left; " type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group mb-3">
                <button  name="submit" class="btn btn btn-info">Login</button>
            </div>
            <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>


<div id="contact" style="margin-top: 50px;">
        <div class="wrapper">
            <div class="footer">
                <div class="footer-section" id="CoUrgent">
                    <h3 style="text-align:center;">CoUrgent</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem, officia?</p>
                </div>
                <div class="footer-section" id="About">
                    <h3 style="text-align:center;">About</h3>
                    <p>MunySafitri 2008107010064</p>
                    <p>Sima Maulina 2008107010070</p>
                    <p>Naufal Alkhalis 2008107010021</p>
                    <p>Safira 2008107010022</p>
                    <p>RazanFawwaz 2008107010098</p>

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
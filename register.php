<?php 
 
$conn = mysqli_connect("localhost", "root", "", "CRUD");
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                header("Location: login.php");
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Register Page</title>
</head>
<body>
    <div class="container">
        
        <form action="" method="POST" class="nosubmit position-relative" >
            <p class="login-text " style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group mb-3" >
                <input type="text" placeholder="Username" name="username"  autocomplete="off" class="form-control  " style="width:30%; float:left; "  value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group mb-3">
                <input autocomplete="off" class="form-control  " style="width:30%; float:left; "  type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group mb-3">
                <input autocomplete="off" class="form-control  " style="width:30%; float:left; "  type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group mb-3">
                <input autocomplete="off" class="form-control  " style="width:30%; float:left; "  type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn btn-info">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login </a></p>
        </form>
    </div>
    
    <div id="contact" style="margin-top: 50px;">
        <div class="wrapper">
            <div class="footer">
                <div class="footer-section" id="CoUrgent">
                    <h3 style="text-align:center;">CoUrgent</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem, officia?</p>
                </div>
                <div class="footer-section" id="About" style ="padding-bottom:-20px">
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
<?php require "_header.php";
$message = "";
$err_username = "";
$err_password = "";
session_start();
require __DIR__ . "/../classes/admin.php";

if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == "true") {
	header("Location: ../admin/index.php");
	exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);

	if (strlen($username) < 5) {
		$err_username  =  "Kullanıcı Adı En az 5 Harfli Olmalı.";
	}
	if (strlen($password) < 7) {
		$err_password  =  "Parola En az 6 Harfli Olmalı.";
	}

	if (empty($err_username) && empty($err_password)) {
		$result = new Admin();
		if ($result->passwdControl($username, $password)) {
			$_SESSION["loggedIn"] = "true";
			$_SESSION["username"] = $username;
			header("Location: ../admin/index.php");
		} else {
			$message = "Kullanıcı adı veya şifre hatalı";
		}
	}

}
?>
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 text-center mb-5">
				<h2 class="heading-section">Jentilmen Login</h2>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-6 col-lg-4">
				<div class="login-wrap p-0">
					<h3 class="mb-4 text-center">Have an account?</h3>
					<form action="login.php" method="POST" class="signin-form">
						<?php if (!empty($message)): ?>
							<div class="alert alert-danger" role="alert">
								<?php echo $message; ?>
							</div>
						<?php endif; ?>
						<?php if (!empty($err_username) || !empty($err_password)): ?>
							<div class="alert alert-danger mt-2 mb-2" role="alert">
								<?php echo $err_username."<br>".$err_password; ?>
							</div>
						<?php endif; ?>
						<div class="form-group">
							<input type="text" name="username" class="form-control" placeholder="Username" required>
						</div>
						<div class="form-group">
							<input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
							<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						</div>
						<div class="form-group">
							<button type="submit" name="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
						</div>
						<div class="form-group d-md-flex">
							<div class="w-50">
								<label class="checkbox-wrap checkbox-primary">Remember Me
									<input type="checkbox" checked>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="w-50 text-md-right">
								<a href="#unutmayacaktın+sıfırlayamazsın" style="color: #fff">Forgot Password</a>
							</div>
						</div>
					</form>
					<p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
					<div class="social d-flex text-center">
						<a href="#Çalışmasını+mı+bekliyorsun" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
						<a href="#Çalışmasını+mı+bekliyorsun" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php require "_footer.php"; ?>
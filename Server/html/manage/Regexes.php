<?php
session_start();

if (isset($_SESSION['_SLP'])) {
	$SLP = $_SESSION['_SLP'];
	if (substr($SLP, 0, 1) === "0") {
		$usrPage = "<li><a href=\"Users.php\">USERS</a></li>";
	} else {
		$usrPage = "";
	}
} else {
	setcookie("Ref.", "/manage/Regexes.php", 0, "/", $_SERVER['HTTP_HOST'], TRUE, TRUE);
	header("Location: /");
	exit;
}

$localCSP = "Content-Security-Policy: ".
	"default-src 'self'; ".
	"style-src 'self' tpicloud.github.io picloud.xyz pi-314159.github.io; ".
	"script-src 'self' tpicloud.github.io cdn1.tian.science pi-314159.github.io; ".
	"font-src 'self' tpicloud.github.io pi-314159.github.io; ".
	"img-src 'self' tpicloud.github.io";
header($localCSP);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="Alert Platform's regexes management page.">
<meta name="keywords" content="alert platform regex,alerts regex">
<meta name="author" content="Mike">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://tpicloud.github.io/Image/Favicon/Alert%20Platform.ico">
<title>Regexes | Manage | Alert Platform</title>
<link rel="stylesheet" type="text/css" href="https://pi-314159.github.io/CSS/select2/select2-4.0.7.min.css">
<link rel="stylesheet" type="text/css" href="https://pi-314159.github.io/jQuery/UI/1.12.1.min.css">
<link rel="stylesheet" type="text/css" href="/supplements/manage/pagesDef.css">
<link rel="stylesheet" type="text/css" href="/supplements/manage/regexes.css">
</head>
<body>
<header>
	<div class="logo">
		<a href="/manage/">
			<img src="/supplements/Alert%20Platform.png" alt="Alert Platform">
		</a>
	</div>
	<span class="mobile-menu">
		<span class="line-1"></span>
		<span class="line-2"></span>
		<span class="line-3"></span>
	</span>

	<nav>
		<ul>
			<li><a href="Regexes.php" class="active">REGEXES</a></li>
			<li><a href="Contacts.php">CONTACTS</a></li>
			<?php echo $usrPage; ?>
			<li><a href="https://picloud.xyz/Others/Contact/?subject=Alert%20Platform%20Error">SUPPORT</a></li>
			<li><a href="/manage/?Logout=True"><i class="fa fa-sign-out"></i></a></li>
		</ul>
	</nav>
</header>
<div class="HEIGHT_86PX"></div>
<div class="container-table100">
	<div class="wrap-table100">
		<div class="row header" disabled>
			<div class="cell">Type</div>
			<div class="cell">Pattern</div>
			<div class="cell">Notify</div>
			<div class="cell">Operation</div>
		</div>
		<div class="row" id="addNewRow">
			<div class="cell" data-title="Type">
				<select name="sources" id="newType" class="custom-select sources" placeholder="IP" required>
					<option value="A">IP</option>
					<option value="B">Service</option>
					<option value="C">Details</option>
					<option value="D">Others</option>
				</select>
			</div>
			<div class="cell" data-title="Pattern">
				<div class="input-field">
					<input type="text" id="newPattern" required />
					<label for="newPattern">WHAT IS THE PATTERN?</label>
				</div>
			</div>
			<div class="cell" data-title="Notify">
				<div class="input-field">
					<input type="text" id="newNotify" required />
					<label for="newNotify">NOTIFY WHOM?</label>
				</div>
			</div>
			<div class="cell" data-title="Operation">
				<button type="submit" class="button1 NEW1" id="newRow1" disabled>ADD&nbsp;&nbsp;<i class="fa fa-send-o"></i></button>
			</div>
		</div>
		<div class="table" id="Table1"></div>
	</div>
</div>
<div class="Modal-Body" id="modalBody">
	<div class="Modal-Content BG_acbce0" id="modalContent">
		<h3 id="ModalTitle"></h3><br>
		<div id="ModalCTNT"></div>
		<button class="w_hover" type="submit" id="submitBTN_Delete">SUBMIT</button>
		<button class="closeModal w_hover" id="closeBTN_1">CLOSE</button>
		<p class="Modal-Close closeModal"></p>
	</div>
</div>
<script src="https://pi-314159.github.io/jQuery/jQuery-3.1.1.min.js"></script>
<script src="https://pi-314159.github.io/jQuery/UI/1.12.1.min.js"></script>
<script src="https://cdn1.tian.science/select2/select2-4.0.7.min.js"></script>
<script src="https://cdn1.tian.science/utf8_base64.js"></script>
<script src="https://tpicloud.github.io/JavaScript/Cookie.js"></script>
<script src="/supplements/manage/pagesDef.js"></script>
<script src="/supplements/manage/WebGL_BG.js"></script>
<script src="/supplements/manage/regexes.js"></script>
</body>
</html>

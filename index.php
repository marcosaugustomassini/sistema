<?php

session_start();
require  'config.php';

if(isset($_POST['email']) && empty($_POST['email']) == false) {

	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);

	$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
	$sql->bindValue(":email", $email);
	$sql->bindValue(":senha", md5($senha));
	$sql->execute();

	if($sql->rowCount() > 0 ) {

		$dado = $sql->fetch();

		$_SESSION['logado'] = $dado['id'];

		?>
		<script type="text/javascript">
		alert("Seja bem-vindo!");
		window.location="inicio.php";
		</script>
		<?php

	} else {

		?>
		<script type="text/javascript">
		alert("E-mail E/OU Senha incorretos!");
		window.location="inicio.php";
		</script>
		<?php

	}

}

?>
<html lang="pt-br">
<head>
	<title>System | Login &copy</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="post">
				<span class="contact100-form-title">
					Login | System
				</span>		
				<div class="wrap-input100 validate-input bg1" data-validate="Digite seu E-mail">
					<span class="label-input100">SEU E-MAIL *</span>
					<input class="input100" type="text" name="email" placeholder="email@email.com">
				</div>

				<div class="wrap-input100 validate-input bg1" data-validate = "Digite sua Senha">
					<span class="label-input100">SUA SENHA *</span>
					<input class="input100" type="password" name="senha">
				</div>
				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn">
						<span>
							ENTRAR
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
				<div class="container-contact100-form-btn">
					<a href="cadastro.php"<button class="contact100-form-btn">
						<span>
							CADASTRE SE AQUI
						</span>
					</button></a>
				</div>
			</form>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

</body>
</html>

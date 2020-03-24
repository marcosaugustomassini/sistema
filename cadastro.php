<?php

session_start();
require 'config.php';

if(isset($_POST['nome']) && empty($_POST['nome']) == false) {

	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$nick = addslashes($_POST['nick']);
	$senha = addslashes($_POST['senha']);
	$patente = addslashes($_POST['patente']);
	$cursos = addslashes($_POST['cursos']);


	$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
	$sql->bindValue(":email", $email);
	$sql->execute();

	if($sql->rowCount() == 0) {

		$sql = $pdo->prepare("INSERT INTO usuarios (nome, email, nick, senha, patente, cursos) VALUES (:nome, :email, :nick, :senha, :patente, :cursos)");
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":nick", $nick);
		$sql->bindValue(":senha", md5($senha));
		$sql->bindValue(":patente", $patente);
		$sql->bindValue(":cursos", $cursos);
		$sql->execute();

		?>
		<script type="text/javascript">
		alert("Cadastro efetudado com sucesso!");
		window.location="index.php";
		</script>
		<?php



	} else {

		?>
		<script type="text/javascript">
		alert("E-mail já cadastrado! - Coloque um e-mail não existente.");
		window.location="cadastro.php";
		</script>
		<?php
		
	
	}

} 

?>
<html lang="pt-br">
<head>
	<title>System | Cadastro &copy</title>
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
			<form class="contact100-form validate-form" method="POST">
				<span class="contact100-form-title">
					Cadastro | System
				</span>

				<div class="wrap-input100 validate-input bg1" data-validate="Digite seu Nome Completo">
					<span class="label-input100">Nome Completo *</span>
					<input class="input100" type="text" name="nome" placeholder="Zezinho Godoy">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Digite seu E-mail">
					<span class="label-input100">E-MAIL *</span>
					<input class="input100" type="text" name="email" placeholder="email@email.com">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">NICK *</span>
					<input class="input100" type="text" name="nick" placeholder="Nick do Habbo">
				</div>

				<div class="wrap-input100 validate-input bg1" data-validate="Digite uma Senha">
					<span class="label-input100">Digite UMA SENHA *</span>
					<input class="input100" type="password" name="senha">
				</div>

				<div class="wrap-input100 input100-select bg1 ">
					<span class="label-input100">PATENTE *</span>
					<div>
						<select class="js-select2" name="patente">
							<option value="1">Soldado</option>
							<option value="2">Cabo</option>
							<option value="3">Sargento</option>
							<option value="4">Subtenente</option>
							<option value="5">Aspirante a Oficial</option>
							<option value="6">Tenente</option>
							<option value="7">Capitão</option>
							<option value="8">General</option>
							<option value="9">Coronel</option>
							<option value="10">Inspetor</option>
							<option value="11">Inspetor-Chefe</option>

						</select>
						<div class="dropDownSelect2"></div>
					</div>
					</div>

					<div class="wrap-input100 input100-select bg1 ">
					<span class="label-input100">CURSOS *</span>
					<div>
						<select class="js-select2" name="cursos">
							<option value="1">CFSd</option>
							<option value="2">CFCb</option>
							<option value="3">CFSg</option>
							<option value="4">CFTn</option>
							<option value="5">CFMj</option>

						</select>
						<div class="dropDownSelect2"></div>
					</div>
					</div>
				


				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn">
						<span>
							CADASTRAR
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
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

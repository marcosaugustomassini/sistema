<?php
session_start();
require 'config.php';

if(isset($_SESSION['logado']) && empty($_SESSION['logado']) == false) {

	$id = $_SESSION['logado'];

	$sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
	$sql->bindValue(":id", $id);
	$sql->execute();

	if($sql->rowCount() > 0 ){

		$infos = $sql->fetch();

	} else {

		header("Location: index.php");
		exit;

	}	

} else {
	header("Location: index.php");
	exit;
}

?>

<html lang="pt-br">
<head>
	<title>System | Inicio &copy</title>
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
			<?php 
  					
  							$sql = $pdo->prepare("SELECT usuarios.*, 
							cursos.cursos_nome AS cur_nome, 
							patentes.permissao_nome AS pat_nome 
							FROM usuarios 
							LEFT JOIN cursos ON usuarios.cursos = cursos.cursos_id
							LEFT JOIN patentes ON usuarios.patente = patentes.permissao_id;");

  							$sql->execute();

  							foreach($sql->fetchAll() as $usuario) ?>

							<H1 align="center">Olá, <?php echo $usuario['pat_nome']; ?> <?php echo $usuario['nick'] ; ?> 
							<?php echo "[".$usuario['cur_nome']."]" ; ?></h1><br/><br/>
							<?php

							$patente = $infos['patente'];
							$curs = $infos['cursos'];
				
							if($patente >= 5) {
							if($curs > 3) {
			
							?>
				<a href="teste.php"><div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn">
						<span>
							PROMOVER POLICIAIS
						</span>
					</button>
				</div></a>
			<?php 
		}}
			?>
			<a href="lista.php"><div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							LISTA DE POLICIAIS
						</span>
					</button>
				</div></a>
			<a href="sair.php"><div class="container-contact100-form-btn">
				<button style="background: red;" type="submit" class="contact100-form-btn">
						<span>
							SAIR
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div></a>
		</div>
	</div>

</body>
</html>

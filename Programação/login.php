<?php 
  session_start();

  if (!isset($_SESSION['aluno_rm']) && !isset($_SESSION['aluno_email'])) { 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login • ELM</title>
	<link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
</head>

<body>
	<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
		<form class="p-5 rounded shadow" action="auth.php" method="post" style="width: 30rem">
			<h1 class="text-center pb-5 display-4">ENTRAR</h1>
			<?php if (isset($_GET['erro'])) { ?>
			<div class="alert alert-danger" role="alert">
				<?=$_GET['erro']?>
			</div>
			<?php } ?>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Endereço de Email
				</label>
				<input type="email" name="email" class="form-control" id="exampleInputEmail1"
					aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Senha
				</label>
				<input type="password" class="form-control" name="senha" id="exampleInputPassword1">
			</div>
			<button type="submit" class="btn btn-primary">LOGIN
			</button>
		</form>
	</div>
</body>

</html>

<?php 
}else {
   header("Location: index.php");
}
 ?>
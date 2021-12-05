<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sistema Seguro de Login</title>
	<link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
</head>

<body>
	<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
		<form class="p-5 rounded shadow" action="auth_senha.php" method="post" style="width: 30rem">
			<h1 class="text-center pb-5 display-4">TROCAR SENHA</h1>
			<?php if (isset($_GET['erro'])) { ?>
			<div class="alert alert-danger" role="alert">
				<?=$_GET['erro']?>
			</div>
			<?php } ?>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Nova senha
				</label>
				<input type="password" name="senha1" class="form-control" id="exampleInputPassword1">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword2" class="form-label">Repita a nova senha
				</label>
				<input type="password" name="senha2" class="form-control" id="exampleInputPassword2">
			</div>
                <input type="submit" class="btn btn-primary" name="alterar" value="Alterar senha" />
			</button>
		</form>
	</div>
</body>

</html>
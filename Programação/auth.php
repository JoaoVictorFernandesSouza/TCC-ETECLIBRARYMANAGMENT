<?php 
session_start();
include 'db_conn.php';

if (isset($_POST['email']) && isset($_POST['senha'])) {
	
	$conexao = mysqli_connect("localhost","root","","biblioteca") or die ("erro!");

	$email = $_POST['email'];
	$senha = $_POST['senha'];

	if (empty($email)) {
		header("Location: login.php?erro=Email requerido");
	}else if (empty($senha)){
		header("Location: login.php?erro=Senha requerida");
	}else {
		$stmt = $conn->prepare("SELECT * FROM aluno WHERE email=?");
		$stmt->execute([$email]);

		# Transformando senha digitada em SHA
		$sql = "SELECT SHA1('$senha')";
		$consulta = mysqli_query($conexao, $sql);
		$senha_sha = mysqli_fetch_array($consulta);
		echo $senha_sha[0];

		if ($stmt->rowCount() === 1) {
			$aluno = $stmt->fetch();

			$aluno_rm = $aluno['rm'];
			$aluno_email = $aluno['email'];
			$aluno_senha = $aluno['senha'];
			$aluno_nome = $aluno['nome'];

			if ($email === $aluno_email) {
				if ($senha_sha[0] === $aluno_senha) {
					$_SESSION['aluno_rm'] = $aluno_rm;
					$_SESSION['aluno_email'] = $aluno_email;
					$_SESSION['aluno_nome'] = $aluno_nome;
					header("Location: index.php");

				}else {
					header("Location: login.php?erro=Email ou senha incorretos");
				}
			}else {
				header("Location: login.php?erro=Email ou senha incorretos");
			}
		}else {
			header("Location: login.php?erro=Email ou senha incorretos");
		}
	}
}
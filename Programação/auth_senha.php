<?php 
session_start();
include 'db_conn.php';

if (isset($_SESSION['aluno_rm']) && isset($_SESSION['aluno_email'])) { 
	
	$conexao = mysqli_connect("localhost","root","","biblioteca") or die ("erro!");

	$rm = $_SESSION['aluno_rm'];
	$senha1 = $_POST['senha1'];
	$senha2 = $_POST['senha2'];

	# Consulta dados da tabela aluno
	$sql_aluno = "select senha from aluno where rm = '$rm'";
	$consulta_aluno = mysqli_query($conexao, $sql_aluno);
	$reg_aluno = mysqli_fetch_array($consulta_aluno);
		
	if($reg_aluno == 0)
	{
		echo "Não possui registros com este parâmetro";
	} else {
		$senha = $reg_aluno["senha"];
	}

    # Hash senhas
	$senha2_hash = password_hash($senha2, PASSWORD_BCRYPT);

	if (empty($senha1)) {
		header("Location: alterar_senha.php?erro=Nova senha requerida");
	} else if (empty($senha2)){
		header("Location: alterar_senha.php?erro=Repita novamente a nova senha");
	} else {
			if ($senha1 == $senha2) {
				if(isset($_REQUEST['alterar'])){
				
					$stmt = $conexao->prepare("UPDATE aluno SET senha = ? WHERE rm = ?;");
					$stmt->bind_param("ss", $senha1, $rm);
					$stmt->execute();

					$stmt2 = $conexao->prepare("UPDATE aluno SET senha = SHA('$senha1') WHERE rm = $rm;");
					$stmt2->execute();

					echo "<script>alert('Senha alterada com sucesso!'); window.location.href=' perfil.php';</script>";
				} else {
					echo "<script>alert('Não foi possível alterar a senha'); window.location.href=' perfil.php';</script>";
				}
			} else {
				header("Location: alterar_senha.php?erro=Senhas diferentes");
			}
	}
}
<?php 
session_start();

$conexao = mysqli_connect("localhost","root","","biblioteca") or die ("erro!");

  # Dados do aluno
  $rm = $_SESSION['aluno_rm'];
  $nome = $_SESSION['aluno_nome'];
  $email = $_SESSION['aluno_email'];

 # Consulta dados da tabela locação para o livro atual locado
 $sql_aluno = "select * from locacao where rm = '$rm' and devolvido = 0;";
 $consulta_aluno = mysqli_query($conexao, $sql_aluno);
 
 $reg_aluno = mysqli_fetch_array($consulta_aluno);
 
 if($reg_aluno == 0)
 {
 # echo "Não possui registros com este parâmetro";
 } else {
 $cod_locacao = $reg_aluno["cod_locacao"];
 $cod_livro = $reg_aluno["cod_livro"];
 $data_locacao = $reg_aluno["data_locacao"];
 $data_devolucao = $reg_aluno["data_devolucao"];
 $devolvido = $reg_aluno["devolvido"];
 $modal = $reg_aluno["modal"];

 $sql = "update locacao set modal = 0 where cod_locacao = $cod_locacao;";
 $consulta = mysqli_query($conexao, $sql);
 }

session_unset();
session_destroy();

header("Location: index.php");
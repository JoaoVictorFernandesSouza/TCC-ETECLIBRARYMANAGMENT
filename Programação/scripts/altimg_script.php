<?php
session_start();

$conexao = mysqli_connect("localhost","root","","biblioteca") or die ("erro!");

  # Dados do aluno
  $rm = $_SESSION['aluno_rm'];
  $nome = $_SESSION['aluno_nome'];
  $email = $_SESSION['aluno_email'];

if(isset($_POST["op"])){
    $op = $_POST["op"];
    $sql = "update aluno set imagem = '$op' where rm = $rm;";
    $consulta = mysqli_query($conexao, $sql);
    header("Location: ../perfil.php");
} else{
    header("Location: ../altimg.php?erro=Clique sobre a imagem que deseja utilizar em seu perfil");
}
<?php
   session_start();

  if (isset($_SESSION['aluno_rm']) && isset($_SESSION['aluno_email'])) { 

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
    }

    if(isset($_REQUEST['devolver']))
    {
        $sql = "UPDATE `locacao` SET `devolvido` = '1' WHERE `locacao`.`cod_locacao` = $cod_locacao;";
        $consulta = mysqli_query($conexao, $sql);
        header("Location: ../perfil.php");
    }
} else {
    header("Location: ../login.php");
 }
?>
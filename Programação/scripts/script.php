<?php
   session_start();

  if (isset($_SESSION['aluno_rm']) && isset($_SESSION['aluno_email'])) { 
    
    $cod_livro = trim($_GET["cod_livro"]);
    $conexao = mysqli_connect("localhost","root","","biblioteca") or die ("erro!");
    $sql = "select * from livro where cod_livro = '$cod_livro'";
    $consulta = mysqli_query($conexao, $sql);
        
    $reg = mysqli_fetch_array($consulta);

    if($reg == 0)
    {
        echo "Não possui registros com este parâmetro";
        exit; 
    }
    else
    {
        $cod_livro = $reg["cod_livro"];
        $titulo = $reg["titulo"];
        $autor = $reg["autor"];
        $descricao = $reg["descricao"];
        $categoria = $reg["categoria"];
        $imagem_ref = $reg["imagem"];
    }

    # Função calcular data de devolução, excluindo fins de semana
    function calcularPrazo($data_devolucao_function){
        $dataSTR = $data_devolucao_function; //hoje
    
        $data = explode('/',$dataSTR);
        $prazoPrevio = 7;

        $time = mktime(0, 0, 0, $data[1], intval($data[0]) + $prazoPrevio, $data[2]);
    
        $diaSemana = date("w", $time);
    
        switch($diaSemana){
            case 0: //domingo
                $prazoPrevio += 1;
                break;
            case 6: //sabado
                $prazoPrevio += 2;
                break;
        }
    
        $time = mktime(0, 0, 0, $data[1], intval($data[0]) + $prazoPrevio, $data[2]);
        return date('Y/m/d',$time);
    }
    
    # Definindo dados para o insert na tabela de locação
    $rm = $_SESSION['aluno_rm'];
    $data_locacao = date('Y/m/d');


    # $data_devolucao =   date('Y/m/d', strtotime("+1 week", strtotime($data_locacao)));
    
    $calcular_data  = date("d/m/Y", strtotime($data_locacao));
    $data_devolucao =  calcularPrazo($calcular_data);
   
    if(isset($_REQUEST['locar']))
    {
        $conexao = mysqli_connect("localhost","root","","biblioteca") or die ("erro!");
        $sql = "INSERT INTO `locacao` (`cod_locacao`, `rm`, `cod_livro`, `data_locacao`, `data_devolucao`, `devolvido`) VALUES
        ('', $rm, $cod_livro, '$data_locacao', '$data_devolucao', 0);";
        $consulta = mysqli_query($conexao, $sql);
        echo "<script>alert('Locação realizada com sucesso!'); window.location.href='../detalhes_livro.php?cod_livro=$cod_livro';</script>";
    }
} else {
    header("Location: ../login.php");
 }
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php 
  session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detalhes • ELM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css">
    <link rel="stylesheet" href="styles/style-detalhes.css">
    <link rel="stylesheet" href="styles/style-index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <style>
        .btn-danger {
            color: #f43444 !important;
            border: 2px solid #f43444 !important;
        }

        .btn-danger:hover {
            color: #fff !important;
            background: #f43444 !important;
            border: 2px solid #f43444 !important;
        }
    </style>
</head>

<body>
    <?php
    $cod_livro = trim($_GET["cod_livro"]);
    $conexao = mysqli_connect("localhost","root","","biblioteca") or die ("erro!");
    
    # Consulta dados da tabela livro
    $sql_livro = "select * from livro where cod_livro = '$cod_livro'";
    $consulta_livro = mysqli_query($conexao, $sql_livro);
    
    $reg_livro = mysqli_fetch_array($consulta_livro);
    
    if($reg_livro == 0)
    {
        echo "Não possui registros com este parâmetro";
        exit; 
    }
    else
    {
        $cod_livro = $reg_livro["cod_livro"];
        $titulo = $reg_livro["titulo"];
        $autor = $reg_livro["autor"];
        $descricao = $reg_livro["descricao"];
        $categoria = $reg_livro["categoria"];
        $imagem_ref = $reg_livro["imagem"];
        /*
        echo"
        Código do livro: $cod_livro<br>
        Título: $titulo<br>
        Autor: $autor<br>
        Descrição: $descricao<br>
        Categoria: $categoria<br>
        ";
        */
    }

    # Consulta dados da tabela locação
    $sql_locacao = "select * from locacao where cod_livro = '$cod_livro' and devolvido = 0;";
    $consulta_locacao = mysqli_query($conexao, $sql_locacao);

    $reg_locacao = mysqli_fetch_array($consulta_locacao);
    
    if($reg_locacao == 0)
    {
        # echo "Não possui registros com este parâmetro";
    }
    else
    {
        $cod_locacao = $reg_locacao["cod_locacao"];
        $rm_aluno = $reg_locacao["rm"];
        $cod_livro = $reg_locacao["cod_livro"];
        $data_locacao = $reg_locacao["data_locacao"];
        $data_devolucao = $reg_locacao["data_devolucao"];
        $devolvido = $reg_locacao["devolvido"];
        
        /*
        echo"
        cod_locacao: $cod_locacao<br>
        rm: $rm<br>
        cod_livro: $cod_livro<br>
        data_locacao: $data_locacao<br>
        data_devolucao: $data_devolucao<br>
        devolvido: $devolvido<br>
        "; 
        */
    }

        # Consulta dados da tabela aluno
        $reg_aluno = 0;
        if (isset($_SESSION['aluno_rm']) && isset($_SESSION['aluno_email'])) { 
        $rm = $_SESSION['aluno_rm'];
        $sql_aluno = "select * from locacao where rm = '$rm' and devolvido = 0;";
        $consulta_aluno = mysqli_query($conexao, $sql_aluno);
        
        $reg_aluno = mysqli_fetch_array($consulta_aluno);
        
        if($reg_aluno == 0)
        {
            # echo "Não possui registros com este parâmetro";
        }
        else
        {
            $cod_locacao = $reg_aluno["cod_locacao"];
            $rm = $reg_aluno["rm"];
            $cod_livro = $reg_aluno["cod_livro"];
            $data_locacao = $reg_aluno["data_locacao"];
            $data_devolucao = $reg_aluno["data_devolucao"];
            $devolvido = $reg_aluno["devolvido"];
        }
    }
    ?>
    <div class="site-wrapper">
        <main class="inner-page-sec-padding-bottom">
            <div style="margin-top: 2rem;" class="container">
                <h2>Detalhes do livro</h2>
                <div class="row  mb--60">
                    <div class="col-lg-5 mb--30">
                        <div class="arrow-type-two d-flex justify-content-center">
                            <div class="single-slide">
                                <img src="<?php echo $imagem_ref ?>" alt="">
                            </div>
                        </div>
                        <div style="display: none;" class="mt--30 product-slider-nav sb-slick-slider arrow-type-two">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="pl-lg--30">
                            <h3 style="margin-bottom: 1.3rem;" class="product-title"><?php echo $titulo ?></h3>
                            <ul style="font-size: 17px;" class="list-unstyled">
                                <li>Autor: <?php echo $autor ?></li>
                                <li>Categoria: <?php echo $categoria ?></li>
                            </ul>
                            <article class="product-details-article">
                                <p></p>
                            </article>
                            <div class="add-to-cart-row">
                                <?php    
                                    if($reg_locacao == 0 && $reg_aluno == 0) {                               
                                ?>
                                <div class="add-cart-btn">
                                    <form action="scripts/script.php?cod_livro=<?php echo $cod_livro ?>" method="post">
                                        <input type="submit" class="button btn btn-outlined--primary" name="locar"
                                            value="Disponível" />
                                    </form>
                                </div>
                                <?php 
                                    } else { 
                                ?>
                                <div class="add-cart-btn">
                                    <button class="button btn btn-danger btn-outlined--primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Indisponível</button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Livro Indisponível <i
                                                        class="far fa-dizzy"></i></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <?php if($reg_locacao != 0) {  
                                                $data_estimada  = date("d/m/Y", strtotime($data_devolucao));
                                            ?>
                                            <div class="modal-body">
                                                Este livro está temporariamente indisponível, pois já se encontra
                                                locado.
                                                <br><br>
                                                Estimativa para a disponibilidade:
                                                <?php echo $data_estimada;?>
                                                <?php } else if($reg_aluno != 0) { ?>
                                                <div class="modal-body">
                                                    Certifique-se que não possua algum livro ainda emprestado da
                                                    biblioteca com você :)
                                                    <?php } ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="add-cart-btn">
                                                        <button type="button"
                                                            class="button btn btn-danger btn-outlined--primary"
                                                            data-bs-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                    } 
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sb-custom-tab review-tab section-padding">
                        <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active">
                                    DESCRIÇÃO
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content space-db--20" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                                <article class="review-article">
                                    <p><?php echo $descricao ?></p>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
                <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                <script src="scripts/script.js"></script>
</body>

</html>
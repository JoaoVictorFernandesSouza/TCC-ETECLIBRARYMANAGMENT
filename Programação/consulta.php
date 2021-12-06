<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa • ELM</title>

    <!-- Links Bootstrap 5.0.2 -->
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">

    <!-- Link CSS style-test -->
    <link rel="stylesheet" href="styles/style-pesquisa.css">

    <!-- Icones Font Awesome -->
    <script src="https://kit.fontawesome.com/8952364c3c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        $expressao = $_POST["expressao"];
        
        $bd=mysqli_connect("localhost", "root", "", "biblioteca") or die ("erro!"); 

        $consulta = mysqli_query($bd,"SELECT * FROM livro WHERE titulo LIKE '$expressao%';");

        /* Cálculo do número que fica localizado em "x resultados totais" */
        /* Select - quantidade total de resultados */
        $total = "SELECT count(*) as total FROM livro WHERE titulo LIKE '$expressao%';";
        $result = mysqli_query($bd, $total);
        $row = mysqli_fetch_assoc($result);
        /* echo $row['total']; */

        $reg = mysqli_fetch_array($consulta);
        if($reg == 0){
            echo"Não existem registros para essa pesquisa!";
            exit;
        }
    ?>
    <!-- Caixa de Pesquisa -->
    <div class="container mt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div style="padding-bottom: 0rem !important;" class="card p-4 mt-3">
                    <div class="d-flex justify-content-center px-5">
                        <div class="search">
                            <form method="POST" action="consulta.php">
                                <input type="text" class="search-input" placeholder="Procurando..." autocomplete="off"
                                    name="expressao">
                                <button style="outline: none; border: none;" class="search-icon" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- <hr class="featurette-divider"> -->
        <div class="row">
            <div class="col-md-12">
                <div id="myCarousel1" class="carousel slide" data-ride="carousel" data-interval="0">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Sua pesquisa foi: "<?php echo "$expressao"; ?>"</h2>
                                    <h4 style="margin-bottom: 2.5rem;">
                                        <?php echo $row['total']; ?> resultados totais
                                    </h4>
                                    <br>
                                </div>
                                <?php
                                    while($reg != 0){
                                    $cod_livro = $reg["cod_livro"];
                                    $titulo = $reg["titulo"];
                                    $autor = $reg["autor"];
                                    $descricao = $reg["descricao"];
                                    $categoria = $reg["categoria"];
                                    $imagem_ref = $reg["imagem"];
                                ?>
                                <div style="margin-bottom: 2rem;" class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="<?php echo "$imagem_ref" ?>" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4><?php echo "$titulo" ?></h4>
                                            <p class="titulo-autor"><?php echo "$autor" ?></p>
                                            <p class="titulo-genero"><?php echo "$categoria" ?></p>
                                            <div class="star-rating">
                                                <a href="detalhes_livro.php?cod_livro=<?php echo "$cod_livro" ?>"
                                                    class="btn btn-primary">Saiba mais</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $reg = mysqli_fetch_array($consulta);
                                   }   
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="featurette-divider">
        </div> <!-- /.container -->
        <footer style="padding-top: 2rem;" class="container">
            <p class="float-end"><a href="index.php">Voltar para a página inicial</a></p>
            <p>ETEC Rodrigues de Abreu &middot; Desenvolvimento de Sistemas &middot; ETEC Library Managment</p>
        </footer>
</body>
</html>
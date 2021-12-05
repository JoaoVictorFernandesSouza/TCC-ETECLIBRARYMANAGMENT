<!DOCTYPE html>
<html lang="pt-br">
<?php 
  session_start();

  $conexao = mysqli_connect("localhost","root","","biblioteca") or die ("erro!");

  if (isset($_SESSION['aluno_rm']) && isset($_SESSION['aluno_email'])) { 
  # Dados do aluno
  $rm = $_SESSION['aluno_rm'];
  $nome = $_SESSION['aluno_nome'];
  $email = $_SESSION['aluno_email'];
  }
?>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Inicio - Teste</title>

   <!-- Links Bootstrap 4.5.3 -->
   <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.css">

   <!-- Link CSS style-test -->
   <link rel="stylesheet" href="styles/style-index.css">

   <!-- Icones Font Awesome -->
   <script src="https://kit.fontawesome.com/8952364c3c.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
      integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

   <!-- Google Fonts -->
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
   <style>
      button.close {
         outline: none !important;
      }
   </style>
</head>

<body>
   <div style="padding-right: 0px !important; padding-left: 0px !important;" class="container-fluid">
      <div class="carousel-inner">
         <div style="height: 32rem;" class="carousel-item active">
            <img src="imagens/background.jpg" alt="Biblioteca">
            <div class="container">
               <?php 
                    if (isset($_SESSION['aluno_rm']) && isset($_SESSION['aluno_email'])) {               
                  ?>
               <div style="cursor: pointer;" class="login btn-lg btn-primary" onclick="window.location='perfil.php';">
                  <span>Meu perfil</span>
                  <div class="icon-login">
                     <i class="fas fa-user-circle"></i>
                  </div>
               </div>
               <?php
                  } else { ?>
               <div style="cursor: pointer;" class="login btn-lg btn-primary" onclick="window.location='login.php';">
                  <span>Faça seu login</span>
                  <div class="icon-login">
                     <i class="fas fa-user-circle"></i>
                  </div>
               </div>
               <?php
                  }
                  ?>
               <div class="carousel-caption text-start">
                  <center>
                     <h1>ETEC Library Managment</h1>
                     <p>A sua biblioteca escolar em todos os lugares</p>
                  </center>
               </div>
            </div>
         </div>
      </div>
   </div><!-- /.container -->

   <!-- Caixa de Pesquisa -->
   <div class="container mt-4">
      <div class="row d-flex justify-content-center">
         <div class="col-md-10">
            <div style="padding-bottom: 5rem !important;" class="card p-4 mt-3">
               <h3 class="heading mt-5 text-center">Olá! Faça sua pesquisa por aqui</h3>
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

   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Livro atrasado <i style="font-size: 25px;"
                     class="far fa-tired"></i></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               Você possui a locação de um livro que se encontra em atraso.<br>
               Realize a devolução quanto mais antes possível!
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-dismiss="modal"
                  onclick="window.location='perfil.php';">Devolver agora</button>
            </div>
         </div>
      </div>
   </div>

   <!-- Carrossel de livros-Clássicos nacionais (DESKTOP) -->

   <div class="container desktop">
      <hr class="featurette-divider">
      <div class="row">
         <div class="col-md-12">
            <h2>Literatura Nacional</h2>
            <div id="myCarousel1" class="carousel slide" data-ride="carousel" data-interval="0">
               <!-- Indicadores do Carrossel - "bolinhas abaixo" -->
               <ol class="carousel-indicators">
                  <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel1" data-slide-to="1"></li>
                  <li data-target="#myCarousel1" data-slide-to="2"></li>
               </ol>
               <!-- Wrapper for carousel items -->
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/domcasmurro.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Dom Casmurro</h4>
                                 <p class="titulo-autor">Machado de Assis</p>
                                 <p class="titulo-genero">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=61" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/ocortico.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>O Cortiço</h4>
                                 <p class="item-price">Aluísio Azevedo</p>
                                 <p class="titulo-genero">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=60" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/oguarani.webp" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>O Guarani</h4>
                                 <p class="item-price">José de Alencar</p>
                                 <p class="item-price">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=59" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/memoriaspostumas.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Memórias Póstumas de Brás Cubas</h4>
                                 <p class="item-price">Machado De Assis</p>
                                 <p class="item-price">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=67" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/olhaioslirios.webp" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Olhai os lírios do campo</h4>
                                 <p class="item-price">Erico Verissimo</p>
                                 <p class="item-price">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=63" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/quarup.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Quarup</h4>
                                 <p class="item-price">Antônio Callado</p>
                                 <p class="item-price">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=64" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/iracema.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Iracema</h4>
                                 <p class="item-price">José De Alencar</p>
                                 <p class="item-price">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=66" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/vidassecas.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Vidas Secas</h4>
                                 <p class="item-price">Graciliano Ramos</p>
                                 <p class="item-price">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=62" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/escravaisaura.webp" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>A Escrava Isaura</h4>
                                 <p class="item-price">Bernardo Guimarães</p>
                                 <p class="item-price">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=69" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/autodacompadecida.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Auto da Compadecida</h4>
                                 <p class="item-price">Ariano Suassuna</p>
                                 <p class="item-price">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=70" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/pagadordepromessas.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>O Pagador de Promessas</h4>
                                 <p class="item-price">Dias Gomes</p>
                                 <p class="item-price">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=65" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/oateneu.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>O Ateneu</h4>
                                 <p class="item-price">Raul Pompeia</p>
                                 <p class="item-price">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=68" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Carousel controls -->
               <a class="carousel-control-prev" href="#myCarousel1" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#myCarousel1" data-slide="next">
                  <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
      </div>
   </div> <!-- /.container -->

   <!-- Carrossel de livros-Clássicos nacionais (CELULAR) -->

   <div class="container celular">
      <hr class="featurette-divider">
      <div class="row">
         <div class="col-md-12">
            <h2>Literatura Nacional</h2>
            <div id="myCarousel2" class="carousel slide" data-ride="carousel" data-interval="0">
               <!-- Indicadores do Carrossel - "bolinhas abaixo" -->
               <ol class="carousel-indicators">
                  <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel2" data-slide-to="1"></li>
                  <li data-target="#myCarousel2" data-slide-to="2"></li>
                  <li data-target="#myCarousel2" data-slide-to="3"></li>
                  <li data-target="#myCarousel2" data-slide-to="4"></li>
                  <li data-target="#myCarousel2" data-slide-to="5"></li>
               </ol>
               <!-- Wrapper for carousel items -->
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/domcasmurro.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Dom Casmurro</h4>
                                 <p class="titulo-autor">Machado de Assis</p>
                                 <p class="titulo-genero">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=61" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/ocortico.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>O Cortiço</h4>
                                 <p class="item-price">Aluísio Azevedo</p>
                                 <p class="item-price">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=60" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/oguarani.webp" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>O Guarani</h4>
                                 <p class="item-price">José de Alencar</p>
                                 <p class="item-price">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=59" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/quarup.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Quarup</h4>
                                 <p class="item-price">Antônio Callado</p>
                                 <p class="item-price">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=64" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/iracema.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Iracema</h4>
                                 <p class="item-price">José de Alencar</p>
                                 <p class="item-price">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=66" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Nacional/escravaisaura.webp" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>A Escrava Isaura</h4>
                                 <p class="item-price">Bernardo Guimarães</p>
                                 <p class="item-price">Literatura Nacional</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=69" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Carousel controls -->
               <a class="carousel-control-prev" href="#myCarousel2" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#myCarousel2" data-slide="next">
                  <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
      </div>
   </div> <!-- /.container -->


   <!-- Parte 2  -->

   <div style="margin-top: 1.5rem;" class="container desktop">
      <div class="row">
         <div class="col-md-12">
            <h2>Literatura Estrangeira</h2>
            <div id="myCarousel3" class="carousel slide" data-ride="carousel" data-interval="0">
               <!-- Indicadores do Carrossel - "bolinhas abaixo" -->
               <ol class="carousel-indicators">
                  <li data-target="#myCarousel3" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel3" data-slide-to="1"></li>
                  <li data-target="#myCarousel3" data-slide-to="2"></li>
               </ol>
               <!-- Wrapper for carousel items -->
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/oslusiadas.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Os Lusíadas</h4>
                                 <p class="titulo-autor">Luís de Camões</p>
                                 <p class="titulo-genero">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=47" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/osmiseraveis.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Os Miseráveis</h4>
                                 <p class="item-price">Victor Hugo</p>
                                 <p class="titulo-genero">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=48" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/quovadis.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Quo Vadis?: Romance do Tempo de Nero</h4>
                                 <p class="item-price">Henryk Sienkiewicz </p>
                                 <p class="item-price">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=58" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/domquixote.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Dom Quixote</h4>
                                 <p class="item-price">Miguel de Cervantes</p>
                                 <p class="item-price">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=49" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/hamlet.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Hamlet</h4>
                                 <p class="item-price">William Shakespeare</p>
                                 <p class="item-price">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=50" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/divinacomedia.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>A divina comédia</h4>
                                 <p class="item-price">Dante Alighieri</p>
                                 <p class="item-price">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=51" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/orgulhoepreconceito.jpg" class="img-fluid"
                                    alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Orgulho e Preconceito</h4>
                                 <p class="item-price">Jane Austen</p>
                                 <p class="item-price">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=52" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/crimeecastigo.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Crime e castigo</h4>
                                 <p class="item-price">Fiódor Dostoiévski</p>
                                 <p class="item-price">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=53" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/guerraepaz.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Guerra e Paz</h4>
                                 <p class="item-price">Leon Tolstói</p>
                                 <p class="item-price">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=54" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/decameron.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Decameron</h4>
                                 <p class="item-price">Giovanni Boccaccio</p>
                                 <p class="item-price">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=55" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/cyranodebergerac.jpg" class="img-fluid"
                                    alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Cyrano de <br />Bergerac</h4>
                                 <p class="item-price">Edmond Rostand</p>
                                 <p class="item-price">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=56" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/annakarienina.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Anna Kariênina</h4>
                                 <p class="item-price">Liev Tolstói</p>
                                 <p class="item-price">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=57" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Carousel controls -->
               <a class="carousel-control-prev" href="#myCarousel3" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#myCarousel3" data-slide="next">
                  <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
      </div>
   </div> <!-- /.container -->

   <!-- Carrossel de livros-Clássicos nacionais (CELULAR) -->

   <div class="container celular">
      <div class="row">
         <div class="col-md-12">
            <h2>Literatura Estrangeira</h2>
            <div id="myCarousel4" class="carousel slide" data-ride="carousel" data-interval="0">
               <!-- Indicadores do Carrossel - "bolinhas abaixo" -->
               <ol class="carousel-indicators">
                  <li data-target="#myCarousel4" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel4" data-slide-to="1"></li>
                  <li data-target="#myCarousel4" data-slide-to="2"></li>
                  <li data-target="#myCarousel4" data-slide-to="3"></li>
                  <li data-target="#myCarousel4" data-slide-to="4"></li>
                  <li data-target="#myCarousel4" data-slide-to="5"></li>
               </ol>
               <!-- Wrapper for carousel items -->
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/oslusiadas.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Os Lusíadas</h4>
                                 <p class="titulo-autor">Luís de Camões</p>
                                 <p class="titulo-genero">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=47" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/osmiseraveis.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Os Miseráveis</h4>
                                 <p class="item-price">Victor Hugo</p>
                                 <p class="item-price">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=48" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/hamlet.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Hamlet</h4>
                                 <p class="item-price">William Shakespeare</p>
                                 <p class="item-price">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=50" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/crimeecastigo.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Crime e castigo</h4>
                                 <p class="item-price">Fiódor Dostoiévski</p>
                                 <p class="item-price">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=53" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/cyranodebergerac.jpg" class="img-fluid"
                                    alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Cyrano de Bergerac</h4>
                                 <p class="item-price">Edmond Rostand</p>
                                 <p class="item-price">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=56" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Literatura Estrangeira/domquixote.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Dom Quixote</h4>
                                 <p class="item-price">Miguel de Cervantes</p>
                                 <p class="item-price">Literatura Estrangeira</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=49" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Carousel controls -->
               <a class="carousel-control-prev" href="#myCarousel4" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#myCarousel4" data-slide="next">
                  <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
      </div>
   </div>


   <!-- Parte 3  -->

   <div style="margin-top: 1.5rem;" class="container desktop">
      <div class="row">
         <div class="col-md-12">
            <h2>Ficção Científica</h2>
            <div id="myCarousel5" class="carousel slide" data-ride="carousel" data-interval="0">
               <!-- Indicadores do Carrossel - "bolinhas abaixo" -->
               <ol class="carousel-indicators">
                  <li data-target="#myCarousel5" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel5" data-slide-to="1"></li>
                  <li data-target="#myCarousel5" data-slide-to="2"></li>
               </ol>
               <!-- Wrapper for carousel items -->
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/materiaescura.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Matéria Escura</h4>
                                 <p class="titulo-autor">Blake Crouch</p>
                                 <p class="titulo-genero">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=39" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/1984.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>1984</h4>
                                 <p class="item-price">George Orwell</p>
                                 <p class="titulo-genero">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=36" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/2001.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>2001: Uma Odisseia no Espaço</h4>
                                 <p class="item-price">Arthur C. Clarke</p>
                                 <p class="item-price">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=37" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/admiravelmundonovo.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Admirável mundo novo</h4>
                                 <p class="item-price">Aldous Huxley</p>
                                 <p class="item-price">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=38" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/arevolucaodosbichos.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>A Revolução dos Bichos</h4>
                                 <p class="item-price">George Orwell</p>
                                 <p class="item-price">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=46" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/451-farenheit.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Fahrenheit 451</h4>
                                 <p class="item-price">Ray Bradbury</p>
                                 <p class="item-price">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=40" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/solaris.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Solaris</h4>
                                 <p class="item-price">Stanislaw Lem</p>
                                 <p class="item-price">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=42" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/eurobo.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Eu Robô</h4>
                                 <p class="item-price">Isaac Asimov</p>
                                 <p class="item-price">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=41" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/aquintaestacao.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>A Quinta Estação</h4>
                                 <p class="item-price">N.K. Jemisin</p>
                                 <p class="item-price">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=43" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/devoradoresdeestrela.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Devoradores de estrelas</h4>
                                 <p class="item-price">Andy Weir</p>
                                 <p class="item-price">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=44" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/ofimdaeternidade.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>O Fim da Eternidade</h4>
                                 <p class="item-price">Isaac Asimov</p>
                                 <p class="item-price">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=45" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/duna.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Duna</h4>
                                 <p class="item-price">Frank Herbert</p>
                                 <p class="item-price">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=35" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Carousel controls -->
               <a class="carousel-control-prev" href="#myCarousel5" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#myCarousel5" data-slide="next">
                  <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
      </div>
   </div> <!-- /.container -->

   <!-- Carrossel de livros-Clássicos nacionais (CELULAR) -->

   <div class="container celular">
      <div class="row">
         <div class="col-md-12">
            <h2>Ficção Científica</h2>
            <div id="myCarousel6" class="carousel slide" data-ride="carousel" data-interval="0">
               <!-- Indicadores do Carrossel - "bolinhas abaixo" -->
               <ol class="carousel-indicators">
                  <li data-target="#myCarousel6" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel6" data-slide-to="1"></li>
                  <li data-target="#myCarousel6" data-slide-to="2"></li>
                  <li data-target="#myCarousel6" data-slide-to="3"></li>
                  <li data-target="#myCarousel6" data-slide-to="4"></li>
                  <li data-target="#myCarousel6" data-slide-to="5"></li>
               </ol>
               <!-- Wrapper for carousel items -->
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/materiaescura.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Matéria Escura</h4>
                                 <p class="titulo-autor">Blake Crouch</p>
                                 <p class="titulo-genero">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=39" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/eurobo.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Eu Robô</h4>
                                 <p class="item-price">Isaac Asimov</p>
                                 <p class="item-price">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=41" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/1984.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>1984</h4>
                                 <p class="item-price">George Orwell</p>
                                 <p class="item-price">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=36" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/451-farenheit.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Fahrenheit 451</h4>
                                 <p class="item-price">Fiódor Dostoiévski</p>
                                 <p class="item-price">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=40" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/2001.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>2001: Uma Odisseia no Espaço</h4>
                                 <p class="item-price">Arthur C. Clarke</p>
                                 <p class="item-price">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=37" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ficção Científica/ofimdaeternidade.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>O Fim da Eternidade</h4>
                                 <p class="item-price">Isaac Asimov</p>
                                 <p class="item-price">Ficção Científica</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=45" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Carousel controls -->
               <a class="carousel-control-prev" href="#myCarousel6" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#myCarousel6" data-slide="next">
                  <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
      </div>
   </div>



   <!-- Parte 4  -->

   <div style="margin-top: 1.5rem;" class="container desktop">
      <div class="row">
         <div class="col-md-12">
            <h2>Ciências Humanas e Sociais</h2>
            <div id="myCarousel7" class="carousel slide" data-ride="carousel" data-interval="0">
               <!-- Indicadores do Carrossel - "bolinhas abaixo" -->
               <ol class="carousel-indicators">
                  <li data-target="#myCarousel7" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel7" data-slide-to="1"></li>
                  <li data-target="#myCarousel7" data-slide-to="2"></li>
               </ol>
               <!-- Wrapper for carousel items -->
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/sapiens.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Sapiens: Uma breve história da humanidade</h4>
                                 <p class="titulo-autor">Yuval Noah Harari</p>
                                 <p class="titulo-genero">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=14" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/ocodigobasicodouniverso.jpg"
                                    class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>O Código Básico do Universo</h4>
                                 <p class="item-price">Dr. Massimo Citro</p>
                                 <p class="titulo-genero">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=7" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/historiadafilosofiagregaeromana.webp"
                                    class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>História da Filosofia Grega e Romana</h4>
                                 <p class="item-price">Giovanni Reale</p>
                                 <p class="item-price">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=8" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/novoiluminismo.jpg" class="img-fluid"
                                    alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>O Novo Iluminismo</h4>
                                 <p class="item-price">Steven Pinker</p>
                                 <p class="item-price">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=9" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/omundoquenaopensa.jpg" class="img-fluid"
                                    alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>O Mundo Que Não Pensa</h4>
                                 <p class="item-price">Franklin Foer</p>
                                 <p class="item-price">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=10" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/pesquisaemcienciashumanasesociais.jpg"
                                    class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Pesquisa em Ciências Humanas e Sociais</h4>
                                 <p class="item-price">Antonio Chizzotti</p>
                                 <p class="item-price">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=11" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/metodosestatisticos.jpg" class="img-fluid"
                                    alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Métodos Estatísticos para as Ciências Sociais</h4>
                                 <p class="item-price">Alan A. e Barbara F.</p>
                                 <p class="item-price">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=12" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img style="width: 63%;"
                                    src="imagens/Ciências Humanas e Sociais/dicionariodascienciashumanas.jpg"
                                    class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Dicionário de Ciências Humanas</h4>
                                 <p class="item-price">Jean-François Dortier</p>
                                 <p class="item-price">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=13" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/otaodafisica.jpg" class="img-fluid"
                                    alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>O Tao da Física</h4>
                                 <p class="item-price">Fritjof Capra</p>
                                 <p class="item-price">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=6" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/humanidade.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Humanidade: Uma história otimista do homem</h4>
                                 <p class="item-price">Rutger Bregman</p>
                                 <p class="item-price">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=15" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/conflitosideologicosedireitoshumanos.jpg"
                                    class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Conflitos Ideológicos & Direitos Humanos</h4>
                                 <p class="item-price">Fernando Quintana</p>
                                 <p class="item-price">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=16" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/inteligenciasocial.jpg" class="img-fluid"
                                    alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Inteligência social</h4>
                                 <p class="item-price">Daniel Goleman</p>
                                 <p class="item-price">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=17" class="btn btn-primary">Saiba mais</a>
                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Carousel controls -->
               <a class="carousel-control-prev" href="#myCarousel7" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#myCarousel7" data-slide="next">
                  <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
      </div>
      <hr class="featurette-divider">
   </div> <!-- /.container -->

   <!-- Carrossel de livros-Clássicos nacionais (CELULAR) -->

   <div class="container celular">
      <div class="row">
         <div class="col-md-12">
            <h2>Ciências Humanas e Sociais</h2>
            <div id="myCarousel8" class="carousel slide" data-ride="carousel" data-interval="0">
               <!-- Indicadores do Carrossel - "bolinhas abaixo" -->
               <ol class="carousel-indicators">
                  <li data-target="#myCarousel8" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel8" data-slide-to="1"></li>
                  <li data-target="#myCarousel8" data-slide-to="2"></li>
                  <li data-target="#myCarousel8" data-slide-to="3"></li>
                  <li data-target="#myCarousel8" data-slide-to="4"></li>
                  <li data-target="#myCarousel8" data-slide-to="5"></li>
               </ol>
               <!-- Wrapper for carousel items -->
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/sapiens.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Sapiens: Uma breve história da humanidade</h4>
                                 <p class="titulo-autor">Yuval Noah Harari</p>
                                 <p class="titulo-genero">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=14" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/historiadafilosofiagregaeromana.webp"
                                    class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>História da Filosofia<br>Grega e Romana</h4>
                                 <p class="item-price">Giovanni Reale</p>
                                 <p class="item-price">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=8" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/metodosestatisticos.jpg" class="img-fluid"
                                    alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Métodos Estatísticos para as Ciências Sociais</h4>
                                 <p class="item-price">Alan A. e Barbara F.</p>
                                 <p class="item-price">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=12" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/dicionariodascienciashumanas.jpg"
                                    class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Dicionário de Ciências Humanas</h4>
                                 <p class="item-price">Jean-François Dortier</p>
                                 <p class="item-price">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=13" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/conflitosideologicosedireitoshumanos.jpg"
                                    class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Conflitos Ideológicos & Direitos Humanos</h4>
                                 <p class="item-price">Arthur C. Clarke</p>
                                 <p class="item-price">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=16" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="thumb-wrapper">
                              <div class="img-box">
                                 <img src="imagens/Ciências Humanas e Sociais/humanidade.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="thumb-content">
                                 <h4>Humanidade: Uma história otimista do homem</h4>
                                 <p class="item-price">Rutger Bregman</p>
                                 <p class="item-price">Ciências Humanas e Sociais</p>
                                 <div class="star-rating">
                                    <a href="detalhes_livro.php?cod_livro=15" class="btn btn-primary">Saiba mais</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Carousel controls -->
               <a class="carousel-control-prev" href="#myCarousel8" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#myCarousel8" data-slide="next">
                  <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
      </div>
      <hr class="featurette-divider">
   </div>
   <footer style="padding-top: 2rem;" class="container">
      <p class="float-end"><a href="#">Voltar ao topo</a></p>
      <p>ETEC Rodrigues de Abreu &middot; Desenvolvimento de Sistemas &middot; ETEC Library Managment</p>
   </footer>
   </main>

   
   <!-- Scripts do Carrossel de livros -->

   <!-- JQuery -->
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <!-- Popper - Funcionamento especificamente para Tooltips -->
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
   <!-- Javascript - Bootstrap 4.5.0 -->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

   <?php

if (isset($_SESSION['aluno_rm']) && isset($_SESSION['aluno_email'])) { 

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

 if($data_devolucao < $data_locacao && $modal == 0){ 
   $sql = "update locacao set modal = 1 where cod_locacao = $cod_locacao;";
   $consulta = mysqli_query($conexao, $sql);
?>
   <script>
      $(document).ready(function () {
         $('#exampleModal').modal('show');
      });
   </script>
   }

<?php  } 
   } 
} 
?>

</body>

</html>
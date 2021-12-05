<!DOCTYPE html>
<html lang="pt-br">
<?php 
  session_start();
  
  if (isset($_SESSION['aluno_rm']) && isset($_SESSION['aluno_email'])) { 

    $conexao = mysqli_connect("localhost","root","","biblioteca") or die ("erro!");

    # Dados do aluno
    $rm = $_SESSION['aluno_rm'];
    $nome = $_SESSION['aluno_nome'];
    $email = $_SESSION['aluno_email'];
    $primeiro_nome = explode(' ',trim($nome));

    $sql_aluno = "select senha from aluno where rm = '$rm'";
    $consulta_aluno = mysqli_query($conexao, $sql_aluno);
    $reg_aluno = mysqli_fetch_array($consulta_aluno);
    
    if($reg_aluno == 0)
    {
        echo "Não possui registros com este parâmetro";
    } else {
        $senha = $reg_aluno["senha"];
    }

    $sql_imagem_perfil = "select * from aluno where rm = '$rm';";
    $consulta_imagem_perfil = mysqli_query($conexao, $sql_imagem_perfil);
        
    $reg_imagem_perfil = mysqli_fetch_array($consulta_imagem_perfil);
        
    if($reg_imagem_perfil == 0){
      # echo "Não possui registros com este parâmetro";
    } else {
      $img_perfil = $reg_imagem_perfil["imagem"];
    }
    
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
  
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style-perfil.css">
  <style>
    body {
      margin-top: 0px;
    }

    .sem-livro {
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
      align-content: center;
      justify-content: center;
      align-items: center;
    }

    @media screen and (min-width: 575px) {
      .sem-livro {
        position: block;
        margin-top: 14%;
        margin-bottom: 14%;
        left: 50%;
        padding: 0 40px;
      }
    }


    .breadcrumb {
      background-color: #f8f8f8;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="main-body">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Início</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">Perfil</a></li>
          <li class="breadcrumb-item active" aria-current="page">Perfil do usuário</li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->

      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="imagens/perfil/<?php echo "$img_perfil.jpg";?>" alt="Admin" class="rounded-circle"
                  width="160">

                <div class="mt-3">
                  <h4><?php echo $primeiro_nome[0]; ?></h4>
                  <p class="text-secondary mb-1"></p>
                  <p class="text-muted font-size-sm"></p>
                  <button class="btn btn-outline-primary" onclick="window.location.href='altimg.php'">Mudar
                    imagem</button>
                  <button class="btn btn-outline-danger" onclick="window.location.href='logout.php'">Sair</button>
                </div>
              </div>
            </div>
          </div>
          <div class="card mt-3">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <a href="http://www.etecbauru.com.br/" style="font-weight: 600;"
                  class="mb-0 text-reset text-decoration-none" target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-globe mr-2 icon-inline">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path
                      d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                    </path>
                  </svg>Site Etec</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <a href="https://github.com/JoaoVictorFernandesSouza/TCC-ETECLIBRARYMANAGMENT" style="font-weight: 600;"
                  class="mb-0 text-reset text-decoration-none" target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-github mr-2 icon-inline">
                    <path
                      d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                    </path>
                  </svg>Github</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <a href="https://www.instagram.com/etecbauru.com.br/" style="font-weight: 600;"
                  class="mb-0 text-reset text-decoration-none" target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-instagram mr-2 icon-inline text-danger">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                  </svg>Instagram</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <a href="https://www.facebook.com/etecrabauru" style="font-weight: 600;"
                  class="mb-0 text-reset text-decoration-none" target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-facebook mr-2 icon-inline text-primary">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                  </svg>Facebook</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nome</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?=$_SESSION['aluno_nome']?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?=$_SESSION['aluno_email']?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Senha</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  •••••••••••••••
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-outline-primary" href="alterar_senha.php">Alterar senha</a>
                  <!-- <form action="alterar_senha.php" method="post">
                      <input type="submit" class="btn btn-outline-primary" name="alterar" value="Alterar senha" />
                  </form> -->
                </div>
              </div>
            </div>
          </div>

          <div class="row gutters-sm">
            <div class="col-sm-6 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <?php if($reg_aluno != 0){ ?>
                  <h5 class="d-flex align-items-center mb-3">Livro atual</h5>
                  <?php
                    # Consulta dados da tabela livro
                    $sql_livro = "select * from livro where cod_livro = '$cod_livro'";
                    $consulta_livro = mysqli_query($conexao, $sql_livro);
        
                    $reg_livro = mysqli_fetch_array($consulta_livro);
        
                    if($reg_livro == 0)
                    {
                        # echo "Não possui registros com este parâmetro";
                    } else {
                        $cod_livro = $reg_livro["cod_livro"];
                        $titulo = $reg_livro["titulo"];
                        $autor = $reg_livro["autor"];
                        $descricao = $reg_livro["descricao"];
                        $categoria = $reg_livro["categoria"];
                        $imagem_ref = $reg_livro["imagem"];
                    }
                   ?>
                  <p>Titulo: <?php echo $titulo ?></p>
                  <p>Autor: <?php echo $autor ?></p>
                  <p>Data da locação: <?php echo date("d/m/Y", strtotime($data_locacao)) ?></p>
                  <p <?php if($data_devolucao < $data_locacao) { ?> style="color: #f72525; font-weight: 600;" <?php } ?> >Data da devolução: <?php echo date("d/m/Y", strtotime($data_devolucao)) ?></p>
                  <form action="scripts/script_devolucao.php" method="post">
                    <input type="submit" class="btn btn-outline-primary" name="devolver" value="Devolver livro" />
                  </form>
                  <?php } else { ?>
                  <div class="sem-livro">
                    <center>
                      <p><i style="font-size: 50px;" class="far fa-grin-beam-sweat"></i></p>
                      <p>Não possui nenhum livro da biblioteca com você.</p>
                    </center>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <div class="card h-100">
                <div class="card-body">

                  <?php
                      $sql_locacao = "select * from locacao where rm = $rm and devolvido = 1 order by cod_locacao DESC LIMIT 1;";
                      $consulta_locacao = mysqli_query($conexao, $sql_locacao);
    
                      $reg_locacao = mysqli_fetch_array($consulta_locacao);
    
                      if($reg_locacao != 0){
                          $cod_ult_locacao = $reg_locacao["cod_locacao"];
                          $cod_ult_livro = $reg_locacao["cod_livro"];
                          $data_ult_locacao = $reg_locacao["data_locacao"];
                          $data_ult_devolucao = $reg_locacao["data_devolucao"];
                          
                          # Consulta dados da tabela livro para o ultimo livro locado
                          $sql_livro_locacao = "select * from livro where cod_livro = '$cod_ult_livro'";
                          $consulta_livro_locacao = mysqli_query($conexao, $sql_livro_locacao);
                    
                          $reg_livro_locacao = mysqli_fetch_array($consulta_livro_locacao);
                    
                          if($reg_livro_locacao == 0){
                          # echo "Não possui registros com este parâmetro"; 
                        } else {
                          $titulo_locacao = $reg_livro_locacao["titulo"];
                          $autor_locacao = $reg_livro_locacao["autor"];
                          ?>
                  <h5 class="d-flex align-items-center mb-3">Último livro locado</h5>
                  <p>Titulo: <?php echo $titulo_locacao ?></p>
                  <p>Autor: <?php echo $autor_locacao ?></p>
                  <p>Data da locação: <?php echo date("d/m/Y", strtotime($data_ult_locacao)) ?></p>
                  <p>Data da devolução: <?php echo date("d/m/Y", strtotime($data_ult_devolucao)) ?></p>
                  <?php
                      }
                  } else {
                  ?>
                  <div class="sem-livro">
                    <center>
                      <p><i style="font-size: 50px;" class="far fa-grin-beam-sweat"></i></p>
                      <p>Você ainda não possui um histórico de locações por aqui.</p>
                    </center>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php 
} else {
   header("Location: login.php");
}
 ?>
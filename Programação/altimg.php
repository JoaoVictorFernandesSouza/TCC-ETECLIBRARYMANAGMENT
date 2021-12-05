<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style-altimg.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <style>
    .mb-12 img {
      margin: 0px 0px;
    }

    input[type="radio"] {
      visibility: hidden;
    }

    label {
      filter: grayscale(100%);
    }

    input[type="radio"]:checked+label {
      filter: grayscale(0%);
    }
  </style>
</head>

<body>
  <div class="row">
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
      <form class="p-5 rounded shadow" action="scripts/altimg_script.php" method="POST">
        <?php if (isset($_GET['erro'])) { ?>
			  <div class="alert alert-primary" role="alert"><?=$_GET['erro']?></div>
			  <?php } ?>
        <div class="col">
          <input type="radio" name="op" value="um" id="i1">
          <label for="i1"><img src="imagens/perfil/um.jpg" alt="" class="rounded-circle" width="150"></label>
          <input type="radio" name="op" value="dois" id="i2">
          <label for="i2"><img src="imagens/perfil/dois.jpg" alt="" class="rounded-circle" width="150"></label>
          <input type="radio" name="op" value="tres" id="i3">
          <label for="i3"><img src="imagens/perfil/tres.jpg" alt="" class="rounded-circle" width="150"></label>
        </div>
        <div class="col">
          <input type="radio" name="op" value="quatro" id="i4">
          <label for="i4"><img src="imagens/perfil/quatro.jpg" alt="" class="rounded-circle" width="150"></label>
          <input type="radio" name="op" value="cinco" id="i5">
          <label for="i5"><img src="imagens/perfil/cinco.jpg" alt="" class="rounded-circle" width="150"></label>
          <input type="radio" name="op" value="seis" id="i6">
          <label for="i6"><img src="imagens/perfil/seis.jpg" alt="" class="rounded-circle" width="150"></label>
        </div>
        <input type="submit" class="btn btn-outline-primary" name="alterar" style="margin-top: 35px;"
          value="Alterar imagem de perfil" />
      </form>
    </div>
  </div>
</body>

</html>
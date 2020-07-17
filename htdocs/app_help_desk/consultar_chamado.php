<?php
  require_once("validador_acesso.php");

  $registros = [];

  $arquivo = fopen("../../app_help_desk/arquivo.txt", "r"); 

  while(!feof($arquivo)){

    $dados = explode('#', fgets($arquivo));
    
    if(count($dados) < 3){
      continue;
    }
    if($_SESSION["type"] == "admin"){
      $registros[] = $dados;
      continue;
    }

    if($_SESSION["id"] == $dados[3]){
      $registros[] = $dados;
    }
  }  
  
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class = "navbar-nav">
          <li class = "nav-item">
          <a href = "logOff.php"class="btn btn-danger btn-sm">SAIR</a>
          </li>
        </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

            <?php foreach ($registros as $chamados) { ?>
            
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $chamados[0]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$chamados[1]?></h6>
                  <p class="card-text"><?= $chamados[2]?></p>

                </div>
              </div>

            <?php }?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
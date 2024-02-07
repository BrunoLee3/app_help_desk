<?php require_once 'validador_acesso.php' ?>

<?php
  $chamados = array();

  $arquivo = fopen('arquivo.txt', 'r');

  //equanto hover registros (linhas) a serem recuperados
  while(!feof($arquivo)){ //testa pelo fim de um arquivo

    $registro = fgets($arquivo); //recuperando registro do arquivo
    
    //explode dos detalhes do registro para verificar o id do usuário responsável pelo cadastro
    $registro_detalhes = explode('#', $registro);

    //verificando se o perfil é de usuário 
    if($_SESSION['perfil_id'] == 2){
      //só será exibido os chamados que foram criados pelo usuário
      if($_SESSION['id'] != $registro_detalhes[0]){
        continue;
      }
      else{
        //atrbuindo dinâmicamente os registros para o array
        $chamados[] = $registro;
      }
    }
    else{
      
      $chamados[] = $registro;
    }

  }

  fclose($arquivo);
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
      <a class="navbar-brand" href="#">
        <img src="imgs/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li classnav-item><a class="nav-link" href="logoff.php">SAIR</a></li>
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
              
            <!-- produção dinâmica dos cards de chamados cadastrados -->
              <?php foreach($chamados as $chamado){ ?>
              
              <?php
                /*quebrando string de chamado em partes e distribuindo em um novo 
                array chamado_dados para depois imprimir seus índices no card por partes*/
                $chamado_dados = explode('#', $chamado);
                
                /*verificando se está faltando conteúdo dentro do array chamado_dados
                para evitar erro na impressão*/
                if(count($chamado_dados) < 4){
                  continue;
                }
              ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"> <?= $chamado_dados[1] ?> </h5>
                  <h6 class="card-subtitle mb-2 text-muted"> <?= $chamado_dados[2] ?> </h6>
                  <p class="card-text"> <?= $chamado_dados[3] ?> </p>

                </div>
              </div>
              
              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
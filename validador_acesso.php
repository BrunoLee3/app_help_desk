<?php
  session_start();

  // verificando se índice de session 'autenticado' existe, ou se o valor desse índice
  // é diferente de "sim".
  if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
    // redirecionamento passando parâmentro de erro2, se a sessão não for autenticada
    header('Location: index.php?login=erro2'); 
  }
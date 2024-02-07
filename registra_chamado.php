<?php
session_start();

//abrindo arquivo
$arquivo = fopen('arquivo.txt', 'a');

//trabalhando na montagem do texto
$titulo = str_replace('#', '-', $_POST['titulo']);
$descricao = str_replace('#', '-', $_POST['descricao']);
$categoria = str_replace('#', '-', $_POST['categoria']);

$texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

//escrevendo texto no arquivo
fwrite($arquivo, $texto);

//fechando arquivo
fclose($arquivo);

header('Location: abrir_chamado.php');
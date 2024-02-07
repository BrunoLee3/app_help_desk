<?php
    session_start();
    
    //variavel que verifica se a autenticação foi realizada
    $usario_autenticado = false;

    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');

    //usarios do sistema
    $usuarios_app = array(
        array('id' => 1, 'email' => 'adm@teste.com', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'user@teste.com', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 3, 'email' => 'jose@teste.com', 'senha' => '1234', 'perfil_id' => 2),
        array('id' => 4, 'email' => 'maria@teste.com', 'senha' => '1234', 'perfil_id' => 2),
    );

    //percorrendo os indicies do array de usuarios, um a um 
    foreach($usuarios_app as $user){
        
        //verificando se email e senha enviados no POST são compatíves com email e senha da relação de usuários 
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usario_autenticado = true; //usuario foi autenticado

            $usuario_id = $user['id']; //associando id do usuario à variavel
            $usuario_perfil_id = $user['perfil_id']; //associando perfil_id à variavel
        }        
    }
    
    //verificando se usuario foi autenticado para tratar de acordo
    if($usario_autenticado == true){
        //usuario autenticado no escopo global para ser verficado em outras instâncias
        $_SESSION['autenticado'] = 'SIM'; 

        //disponibilizando id do usuario no escopo global da aplicação
        $_SESSION['id'] = $usuario_id;

        //disponibilizando usuario_perfil_id no escopo global da aplicação 
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        
        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro'); //redirecionamento passando parâmentro de erro
    }
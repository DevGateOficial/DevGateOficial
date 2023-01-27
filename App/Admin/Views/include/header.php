<?php
if (!defined('D3V3G4T3')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LINK GOOGLE -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- LINK CSS -->
    <link rel="stylesheet" href="<?= URLSRC; ?>assets/dist/ui/trumbowyg.min.css" />
    <link rel="stylesheet" href="<?= URLSRC; ?>assets/css/dashboard/dashboard.css" />
    <!-- <link rel="stylesheet" href="<?= URLSRC; ?>assets/css/dashboard/NEW-dashboard.css" /> -->

    <link rel="stylesheet" href="<?= URLSRC; ?>assets/css/list-usuarios.css" />
    <link rel="stylesheet" href="<?= URLSRC; ?>assets/css/listCursos.css" />
    <link rel="stylesheet" href="<?= URLSRC; ?>assets/css/cadastroCurso.css" />
    <link rel="stylesheet" href="<?= URLSRC; ?>assets/css/email-server.css" />
    <link rel="stylesheet" href="<?= URLSRC; ?>assets/css/ADMIN/cursos/view-curso.css" />
    <link rel="stylesheet" href="<?= URLSRC; ?>assets/css/criar-aula.css" />
    <link rel="stylesheet" href="<?= URLSRC; ?>assets/css/criar-atividade.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>



    <!-- LINK SCRIPT -->
    <script type="text/javascript" src="<?= URLSRC; ?>assets/js/cursos-handler.js"></script>
    <script type="text/javascript" src="<?= URLSRC; ?>assets/js/menu.js" defer></script>
    <!-- <script type="text/javascript" src="<?= URLSRC; ?>assets/js/drag_and_drop.js" defer></script> -->
    <script type="text/javascript" src="<?= URLSRC; ?>assets/js/edit-emailServer.js" defer></script>
    <script type="text/javascript" src="<?= URLSRC; ?>assets/js/Admin/cadastroAula-modal.js" defer></script>
    <script type="text/javascript" src="<?= URLSRC; ?>assets/js/Admin/cadastroAtividade-modal.js" defer></script>
    <script type="text/javascript" src="<?= URLSRC; ?>assets/js/Admin/solicitacoes.js" defer></script>
    <script type="text/javascript" src="<?= URLSRC; ?>assets/js/Admin/cadastro-curso.js" defer></script>

    <!-- LINK FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;700&display=swap" rel="stylesheet" />


    <!-- FAV ICON -->
    <link rel="shortcut icon" href="<?= URLSRC; ?>assets/img/logo-devgate-bg-preto.png">

    <title>Devgate</title>
</head>

<body>
    <div class="container">
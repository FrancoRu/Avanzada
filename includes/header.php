<!DOCTYPE html>
<html>

<head>
    <title>ToDo-List</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../includes/style.css">
    <link rel="icon" href="../includes/icono.png" type="image/png">
</head>


<body class="d-flex flex-column min-vh-100">
    <script src="../includes/header.js"></script>
    <header class="bg-danger.bg-gradient">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="main.php" id="titulo">TO-DO <strong>LIST</strong></a>

            <div id="gifs-perrones" style="display: none;">
                <img src="https://media.giphy.com/media/10hoTR53wwnV2o/giphy.gif" alt="Conga conga" id="gif">
                <img src=" https://media.giphy.com/media/3ohhwLD8tZNKkL4t9e/giphy.gif" alt="Conga conga" id="gif">
                <img src="https://media.giphy.com/media/3ohzdN48ihh11IUeOc/giphy.gif" alt="Conga conga" id="gif">
                <img src="https://media.giphy.com/media/l378rxSXhAg57Xeo0/giphy.gif" alt="Conga conga" id="gif">
                <img src="https://media.giphy.com/media/Kkb1ByEZ4fwGI/giphy.gif" alt="Conga conga" id="gif">
                <img src="https://media.giphy.com/media/O7VUh4Y1Whvr2/giphy.gif" alt="Conga conga" id="gif">
                <img src="https://media.giphy.com/media/4JtXt9i56Wp6U/giphy.gif" alt="Conga conga" id="gif">
                <img src="https://media.giphy.com/media/fojJlPjoRgRpe/giphy.gif" alt="Conga conga" id="gif">
                <img src="https://media.giphy.com/media/3ohhwgCvTYLOs3UqM8/giphy.gif" alt="Conga conga" id="gif">
                <img src="https://media.giphy.com/media/uaBUkZfAVFET6/giphy.gif" alt="Conga conga" id="gif">
                <img src="https://media.giphy.com/media/9N5GI4UhuUTh6/giphy.gif" alt="Conga conga" id="gif">
                <img src="https://media.giphy.com/media/weQG1zCbffpew/giphy.gif" alt="Conga conga" id="gif">
            </div>

            <!--<button class="amigues-boton" id="amiguitosGifs">Amiguitos :D</button>-->
            <button class="btn-55 amiguesBoton" id="amiguitosGifs"><span>Amiguitos :D</span></button>


            <button id="navbarToggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo '<li class="nav-item">';
                        echo '<span class="navbar-text mr-2">Hola, ' . $_SESSION['username'] . '</span>';
                        echo '</li>';
                        echo '<li class="nav-item">';
                        echo '<a class="btn btn-danger" href="logout.php">Logout</a>';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container flex-grow-1">
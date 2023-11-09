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

            <div id="gifs-perrones" class="animated-div" style="display: none;">                
                <img src="../includes/gifs/gif1.gif" alt="Conga conga" id="gif">
                <img src="../includes/gifs/gif2.gif" alt="Conga conga" id="gif">
                <img src="../includes/gifs/gif3.gif" alt="Conga conga" id="gif">
                <img src="../includes/gifs/gif4.gif" alt="Conga conga" id="gif">
                <img src="../includes/gifs/gif5.gif" alt="Conga conga" id="gif">
                <img src="../includes/gifs/gif6.gif" alt="Conga conga" id="gif">
                <img src="../includes/gifs/gif7.gif" alt="Conga conga" id="gif">
                <img src="../includes/gifs/gif8.gif" alt="Conga conga" id="gif">
                <img src="../includes/gifs/gif9.gif" alt="Conga conga" id="gif">
                <img src="../includes/gifs/gif10.gif" alt="Conga conga" id="gif">
                <img src="../includes/gifs/gif11.gif" alt="Conga conga" id="gif">
            </div>

            <!--<button class="amigues-boton" id="amiguitosGifs">Amiguitos :D</button>-->
            <button class="btn-55 amiguesBoton" id="amiguesBoton"><span>Amiguitos :D</span></button>


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
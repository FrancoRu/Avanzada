<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
?>

<?php include('../includes/header.php'); ?>

<div class="container" id="buscador">
    <form id="form-Tarea">
        <div class="form-row align-items-center">
            <div class="col-auto">
                <div class="form-group">
                    <input type="text" class="form-control" required id="tarea-nueva" name="task" placeholder="Nombre de tarea">
                </div>
            </div>
            <div class="col-auto align-self-start">
                <button type="submit" class="btn btn-primary" id="btn_main">Agregar</button>
            </div>
        </div>
    </form>
</div>




<?php include_once 'taskTable.php' ?>
<script src="main.js"></script>

<?php include('../includes/footer.php'); ?>
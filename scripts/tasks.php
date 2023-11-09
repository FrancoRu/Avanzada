<?php
// require_once __DIR__ . '/../scripts/auth.php';
// session_start();

// $conn = new Auth();

// // Procesa el formulario si se ha enviado
// if ($_SERVER["REQUEST_METHOD"] == "POST") {    
//     $tarea = $_POST["tarea"];
//     if($conn->agregarTarea($tarea)){
//         echo '<script>$(document).ready(function() {
//                 $.notify("Tarea agregada exitosamente", "success");});
//             </script>';
//     }else{                                                  //no funca notify, sria bueno que muestre cuando no lo realiza
//         echo '<script>$(document).ready(function() {
//             $.notify("Error al agregar la tarea", "error");});  
//         </script>';    
//     }    
// }else{
//     error_log("Error-Agregar-Tarea");
// }

// header("Location: ../pages/main.php");

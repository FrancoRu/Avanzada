<?php
require_once __DIR__ . '/../scripts/auth.php';
require_once __DIR__ . '/tagService.php';
session_start();
$Conn = new Auth();
$tag = TagService::getInstance();
if (isset($_SESSION['user_id'])) {
  $info = array(
    'user_id' => $_SESSION['user_id']
  );
  error_log('hasta aca esta');
  error_log(json_encode($info));
  $result = $Conn->getAllTasks($info);
  if ($result->num_rows > 0) {
    $tabla = $tag->getTable($result);
    echo $tabla;
    exit();
  } else {
    http_response_code(500); // Error interno del servidor
    echo json_encode(array('message' => 'Error al traer las tareas'));
  }
} else {
  http_response_code(400); // Solicitud incorrecta
  echo json_encode(array('message' => 'Falta el parámetro user_id en la solicitud'));
}

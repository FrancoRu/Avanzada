<?php
require_once __DIR__ . '/../scripts/auth.php';
require_once 'tagService.php';
session_start();
$Conn = new Auth();
$tag = TagService::getInstance();

$result = $Conn->lastTask([$_SESSION['user_id']]);
if ($result->num_rows > 0) {
  http_response_code(200);
  $row = $tag->getRow($result);
  echo $row;
  exit();
} else {
  http_response_code(500); // Error interno del servidor
  echo json_encode(array('message' => 'Error al Crear la tarea'));
}

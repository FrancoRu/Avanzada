<?php
require_once __DIR__ . '/../scripts/auth.php';
require_once 'tagService.php';
session_start();
$Conn = new Auth();
$tag = TagService::getInstance();

$result = $Conn->lastTask();
return $tag->getRow($result);
if ($result !== false) {
  return $tag->getRow($result);
  http_response_code(200);
  echo json_encode(array('message' => 'Tarea creada exitosamente'));
  exit();
} else {
  http_response_code(500); // Error interno del servidor
  echo json_encode(array('message' => 'Error al Crear la tarea'));
}

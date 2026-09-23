<?php
header('Content-Type: application/json');
echo json_encode([
    "status" => "success",
    "message" => "Привіт від PHP бекенду!",
    "server" => $_SERVER['SERVER_SOFTWARE'] ?? 'Невідомо'
]);
?>
<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Content-type:application/json');

echo json_encode($data['bienvenue'], TRUE);
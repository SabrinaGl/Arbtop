<?php
session_start();
$id = $_POST['id'];
$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("DELETE FROM produkt WHERE ID = '$id'");
$statement->execute(array());

header("Location: http://localhost/I_A_Projekt/startbootstrap-business-casual-gh-pages/Admin/Produktverwaltung/produktverwaltung.php");
?>
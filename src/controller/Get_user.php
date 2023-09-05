<?php

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once("../model/connection.php");

    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        session_start();
        $_SESSION['user'] = $row;
        require_once($_SERVER["DOCUMENT_ROOT"]) . "/src/controller/DashbordController.php";
        $resul = new Usuario();
        $resul->Dashbord();
        header('location: ../views/home.php');

    } else {
        header('location: /src/index.php');
    }
} else {
    header('location: /src/index.php');
}

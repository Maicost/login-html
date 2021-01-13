<?php
try {
    session_start();
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $username = maico;
    $password = 1;
    $database = bancodeteste;
    $table1 = alunos;

    $con = new PDO("mysql:host=localhost;dbname=$database", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM `USUARIO` WHERE `NOME` = '$login' AND `SENHA`= '$senha'";
    $sth = $con->prepare("".$sql);
    $sth->execute();
    $result = $sth->fetchAll();

    if ($result) {
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        unset($_SESSION['count']);
        header('location:site.php');
    } else {
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        $_SESSION['count'] = 1;
        $isError = true;
        header('location:index.php');
    }
} catch (Exception $e){
    echo "Erro: ".$e;
}
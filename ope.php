<?php
try {
    session_start();
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $acao = $_POST['acao'];
    $tableUser = "usuarios";
    $collumnLogin = "login";
    $collumnPass = "password";

    include "connPDO.php";

    switch ($acao) {
        case 'logar':
            $query = "SELECT * FROM $tableUser WHERE $collumnLogin = ?";
            $sth = $con->prepare($query);
            $sth->execute([$login]);
            $result = $sth->fetch();
            if (password_verify($senha, $result[$collumnPass])) {
                $_SESSION['login'] = $login;
                $_SESSION['senha'] = $senha;
                unset($_SESSION['falha']);
                header('location:site.php');
            } else {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                $_SESSION['falha'] = true;
                header('location:index.php');
            }
            break;

        case 'cadastro':
            $query = "SELECT $collumnLogin FROM $tableUser WHERE $collumnLogin = ?";
            $sth = $con->prepare($query);
            $sth->execute([$login]);
            if (!$sth->fetch()) {
                $cryptSenha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
                $query = "INSERT INTO $tableUser ($collumnLogin, $collumnPass) VALUES (?, ?)";
                $sth = $con->prepare($query);
                $sth->execute([$login, $cryptSenha]);
                unset($_SESSION['falha']);
                $_SESSION['hasCadastrado'] = true;
                header('location:index.php');
            } else {
                $_SESSION['falha'] = true;
                header('location:cadastro.php');
            }
            break;

        default:
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                unset($_SESSION['falha']);
                header('location:index.php');
            break;
    }
} catch (Exception $e) {
    echo "Erro: " . $e;
}

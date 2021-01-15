<?php
try {
    session_start();
    $login = $valor_criptografado = sha1($_POST['login']);
    $senha = $valor_criptografado = sha1($_POST['senha']);
    $acao = $_POST['acao'];
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

    switch ($acao) {
        case 'logar':
            if ($result) {
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
            if(!$result) {
                $sql = "INSERT INTO `USUARIO` (`NOME`, `SENHA`) VALUES ('$login', '$senha')";
                $sth = $con->prepare($sql);
                $sth->execute();
                unset($_SESSION['falha']);
                $_SESSION['hasCadastrado'] = true;
                header('location:index.php');
            } else {
                $_SESSION['falha'] = true;
                header('location:cadastro.php');
            }
            break;
        
        default:
            # code...
            break;
    }
} catch (Exception $e){
    echo "Erro: ".$e;
}